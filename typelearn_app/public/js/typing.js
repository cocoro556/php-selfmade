// ========================================
// タイピング練習アプリ - メインJavaScript
// ========================================

// ========================================
// グローバル変数
// ========================================

/**
 * 練習の進行状況を管理するデータ
 * - currentQuestion: 現在の問題番号（1から開始）
 * - totalQuestions: 総問題数（3問で固定）
 * - correctCount: 正解数
 * - startTime: 練習開始時刻
 */
let progressData = {
    currentQuestion: 1,
    totalQuestions: 3,
    correctCount: 0,
    startTime: Date.now(),
};

// ========================================
// 初期化処理
// ========================================

/**
 * ページ読み込み完了時の処理
 * - ボタンのイベントリスナー設定
 * - 進行状況の初期化
 * - 時間更新の開始
 * - エンターキーの設定
 */
document.addEventListener("DOMContentLoaded", function () {
    // ========================================
    // ボタンのイベントリスナー設定
    // ========================================

    // チェックボタン：回答を送信して採点
    const checkButton = document.getElementById("check-button");
    if (checkButton) {
        checkButton.addEventListener("click", function (e) {
            e.preventDefault();
            submitAnswer();
        });
    }

    // スキップボタン：現在の問題をスキップ
    const skipButton = document.getElementById("skip-button");
    if (skipButton) {
        skipButton.addEventListener("click", function (e) {
            e.preventDefault();
            skipQuestion();
        });
    }

    // ヒントボタン：ヒントの表示/非表示切り替え
    const hintButton = document.getElementById("hint-button");
    if (hintButton) {
        hintButton.addEventListener("click", function (e) {
            e.preventDefault();
            showHint();
        });
    }

    // ========================================
    // 初期化処理
    // ========================================

    // 進行状況の初期化
    initializeProgress();

    // 1秒ごとに経過時間を更新
    setInterval(updateElapsedTime, 1000);

    // ========================================
    // エンターキーの設定
    // ========================================

    // エンターキーでチェックボタンを実行
    const answerInput = document.getElementById("answer-input");
    if (answerInput) {
        answerInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                // チェックボタンが無効化されている場合は処理をスキップ
                const checkButton = document.getElementById("check-button");
                if (checkButton && !checkButton.disabled) {
                    submitAnswer();
                }
            }
        });
    }
});

// ========================================
// 進行状況管理
// ========================================

/**
 * 進行状況の初期化
 * - 開始時刻を現在時刻に設定
 * - 画面表示を更新
 */
function initializeProgress() {
    progressData.startTime = Date.now();
    updateProgressDisplay();
}

/**
 * 進行状況の表示を更新
 * - 問題番号、総問題数、正解数を画面に反映
 * - 経過時間も同時に更新
 */
function updateProgressDisplay() {
    document.getElementById("current-question").textContent =
        progressData.currentQuestion;
    document.getElementById("total-questions").textContent =
        progressData.totalQuestions;
    document.getElementById("correct-count").textContent =
        progressData.correctCount;
    updateElapsedTime();
}

/**
 * 経過時間を更新
 * - 開始時刻からの経過時間を計算
 * - 分:秒形式で画面に表示
 */
function updateElapsedTime() {
    const elapsed = Math.floor((Date.now() - progressData.startTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    const timeString = `${minutes.toString().padStart(2, "0")}:${seconds
        .toString()
        .padStart(2, "0")}`;
    document.getElementById("elapsed-time").textContent = timeString;
}

// ========================================
// 回答処理
// ========================================

/**
 * 回答送信処理
 * - ユーザーの回答をサーバーに送信
 * - 正解/不正解の判定結果を表示
 * - 正解の場合は次の問題へ、不正解の場合は同じ問題で継続
 */
function submitAnswer() {
    // ========================================
    // 入力値の取得と検証
    // ========================================

    const answerText = document.getElementById("answer-input").value;
    const questionId = document.getElementById("question-id").value;
    const startTime = parseInt(document.getElementById("start-time").value);

    // 回答が空の場合は処理を中断
    if (!answerText.trim()) {
        alert("回答を入力してください");
        return;
    }

    // 回答にかかった時間を計算
    const timeTaken = Math.floor((Date.now() - startTime) / 1000);

    // ========================================
    // サーバーへの回答送信
    // ========================================

    fetch("/typing/check-answer", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            question_id: questionId,
            answer_text: answerText,
            time_taken: timeTaken,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            // 結果を画面に表示
            showResult(data);

            // ========================================
            // 正解時の処理
            // ========================================

            if (data.is_correct) {
                // チェックボタンを無効化して連打を防ぐ
                const checkButton = document.getElementById("check-button");
                if (checkButton) {
                    checkButton.disabled = true;
                    checkButton.textContent = "正解！";
                }

                // 正解数を増やす
                progressData.correctCount++;

                // ========================================
                // 問題の進行判定
                // ========================================

                if (
                    progressData.currentQuestion >= progressData.totalQuestions
                ) {
                    // 3問目完了：結果画面に移動
                    saveTypingResult();
                    updateProgressDisplay();
                    setTimeout(() => {
                        window.location.href = "/typing/result";
                    }, 1500);
                } else {
                    // 次の問題へ：問題番号を増やして次の問題を読み込み
                    progressData.currentQuestion++;
                    updateProgressDisplay();
                    setTimeout(() => {
                        loadNextQuestion();
                    }, 1500);
                }
            }
            // 不正解の場合は何もしない（同じ問題で継続）
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("通信エラーが発生しました");
        });
}

// ========================================
// 次の問題の読み込み
// ========================================

/**
 * 次の問題を読み込む
 * - 現在の問題ID、カテゴリー、難易度をサーバーに送信
 * - 次の問題の情報を取得して画面を更新
 * - 3問目完了後は結果画面に移動
 */
function loadNextQuestion() {
    // ========================================
    // 問題数の上限チェック
    // ========================================

    // 3問目を解き終わった後に結果画面へ移動
    if (progressData.currentQuestion > progressData.totalQuestions) {
        window.location.href = "/typing/result";
        return;
    }

    // ========================================
    // 次の問題の要求データ準備
    // ========================================

    const currentQuestionId = document.getElementById("question-id").value;

    // 現在のカテゴリーと難易度を取得（隠しフィールドから）
    const categoryName = document.getElementById("current-category")?.value;
    const difficulty = document.getElementById("current-difficulty")?.value;

    // ========================================
    // サーバーから次の問題を取得
    // ========================================

    fetch("/typing/get-next-question", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            current_question_id: currentQuestionId,
            category_name: categoryName,
            difficulty: difficulty,
            is_my: document.getElementById('is-my')?.value === '1' ? 1 : 0,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // 次の問題取得成功：画面を更新
                updateQuestionDisplay(data.question);
            } else {
                // 次の問題取得失敗：エラーメッセージを表示
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("次の問題の読み込みに失敗しました");
        });
}

// ========================================
// 問題表示の更新
// ========================================

/**
 * 問題表示を更新
 * - 新しい問題の内容を画面に反映
 * - 入力フィールドやボタンの状態をリセット
 * - 進行状況を更新
 */
function updateQuestionDisplay(question) {
    // ========================================
    // 問題内容の更新
    // ========================================

    // 問題テキストを更新
    const questionTextElement = document.querySelector(".text-lg");
    if (questionTextElement) {
        questionTextElement.textContent = question.question_text;
    }

    // カテゴリー名を更新
    const categoryElements = document.querySelectorAll(
        ".text-xs.tracking-widest.text-gray-400"
    );
    if (categoryElements.length > 0) {
        categoryElements[0].textContent = `カテゴリ: ${question.category_name}`;
    }

    // 難易度を更新
    if (categoryElements.length > 1) {
        categoryElements[1].innerHTML = `難易度: ${question.difficulty_name}`;
    }

    // ========================================
    // フォーム要素のリセット
    // ========================================

    // 問題IDを更新
    document.getElementById("question-id").value = question.id;

    // 開始時間をリセット
    document.getElementById("start-time").value = Date.now();

    // 入力フィールドをクリア
    document.getElementById("answer-input").value = "";

    // ========================================
    // UI要素のリセット
    // ========================================

    // 結果メッセージを非表示
    const resultDiv = document.getElementById("result-message");
    if (resultDiv) {
        resultDiv.classList.add("hidden");
    }

    // ヒントカードを非表示
    const hintCard = document.getElementById("hint-card");
    if (hintCard) {
        hintCard.classList.add("hidden");
    }

    // チェックボタンを再度有効化
    const checkButton = document.getElementById("check-button");
    if (checkButton) {
        checkButton.disabled = false;
        checkButton.textContent = "チェック";
    }

    // ========================================
    // 進行状況の更新
    // ========================================

    // 進行状況を更新
    updateProgressDisplay();
}

// ========================================
// スキップ処理
// ========================================

/**
 * 問題をスキップ
 * - 現在の問題をスキップして次の問題へ
 * - 3問目完了後は結果画面に移動
 */
function skipQuestion() {
    // 3問目をスキップした場合は結果画面に移動
    if (progressData.currentQuestion >= progressData.totalQuestions) {
        // 練習結果をセッションストレージに保存
        saveTypingResult();

        updateProgressDisplay();
        window.location.href = "/typing/result";
        return;
    }

    // スキップする場合、問題番号を増やして次の問題を読み込む
    progressData.currentQuestion++;
    updateProgressDisplay();
    loadNextQuestion();
}

// ========================================
// UI表示・操作
// ========================================

/**
 * 結果表示
 * - 正解/不正解の結果を画面に表示
 * - 正解時は青い枠線、不正解時は赤い枠線
 */
function showResult(data) {
    const resultDiv = document.getElementById("result-message");
    if (resultDiv) {
        resultDiv.textContent = data.message;
        resultDiv.className = data.is_correct
            ? "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border-2 border-blue-500 bg-blue-900/20 text-blue-200"
            : "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border-2 border-red-500 bg-red-900/20 text-red-200";
        resultDiv.classList.remove("hidden");
    }
}

/**
 * ヒントの表示/非表示切り替え
 * - ヒントカードの表示状態を切り替え
 * - ボタンのテキストも同時に更新
 */
function showHint() {
    const hintCard = document.getElementById("hint-card");
    const hintButton = document.getElementById("hint-button");

    if (hintCard && hintButton) {
        if (hintCard.classList.contains("hidden")) {
            // ヒントが非表示の場合 → 表示する
            hintCard.classList.remove("hidden");
            hintButton.textContent = "ヒントを隠す";
        } else {
            // ヒントが表示されている場合 → 非表示にする
            hintCard.classList.add("hidden");
            hintButton.textContent = "ヒントを見る";
        }
    }
}

// ========================================
// エラー処理・データ保存
// ========================================

/**
 * エラー表示
 * - エラーメッセージを赤い枠線で表示
 */
function showError(message) {
    const resultDiv = document.getElementById("result-message");
    if (resultDiv) {
        resultDiv.textContent = message;
        resultDiv.className =
            "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border border-red-500 bg-red-900/20 text-red-200";
        resultDiv.classList.remove("hidden");
    }
}

/**
 * 練習結果をセッションストレージに保存
 * - 正解数、総問題数、経過時間を保存
 * - 結果画面で表示するために使用
 */
function saveTypingResult() {
    const elapsed = Math.floor((Date.now() - progressData.startTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    const timeString = `${minutes.toString().padStart(2, "0")}:${seconds
        .toString()
        .padStart(2, "0")}`;

    // セッションストレージに保存（ページ遷移後も保持）
    sessionStorage.setItem("typing_correct_count", progressData.correctCount);
    sessionStorage.setItem(
        "typing_total_questions",
        progressData.totalQuestions
    );
    sessionStorage.setItem("typing_elapsed_time", timeString);
}

// ========================================
// 結果画面用の処理
// ========================================

/**
 * 結果画面で練習結果を表示
 * - セッションストレージから結果を取得
 * - 画面に表示してクリア
 */
function initializeResultDisplay() {
    // セッションストレージから練習結果を取得
    const correctCount = sessionStorage.getItem("typing_correct_count") || 0;
    const totalQuestions =
        sessionStorage.getItem("typing_total_questions") || 3;
    const elapsedTime =
        sessionStorage.getItem("typing_elapsed_time") || "00:00";

    // 正解率を計算
    const correctRate =
        totalQuestions > 0
            ? Math.round((correctCount / totalQuestions) * 100)
            : 0;

    // 画面に表示
    document.getElementById("correct-count").textContent = correctCount;
    document.getElementById("total-questions").textContent = totalQuestions;
    document.getElementById("elapsed-time").textContent = elapsedTime;
    document.getElementById("correct-rate").textContent = correctRate + "%";

    // セッションストレージをクリア
    sessionStorage.removeItem("typing_correct_count");
    sessionStorage.removeItem("typing_total_questions");
    sessionStorage.removeItem("typing_elapsed_time");
}

// ========================================
// 画面別の初期化処理
// ========================================

/**
 * 結果画面でのみ実行される初期化処理
 * - 練習結果の表示
 */
if (window.location.pathname.includes("/typing/result")) {
    document.addEventListener("DOMContentLoaded", initializeResultDisplay);
}
