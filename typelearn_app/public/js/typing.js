// ページ読み込み完了時の処理
document.addEventListener("DOMContentLoaded", function () {
    // チェックボタンにイベントリスナーを追加
    const checkButton = document.getElementById("check-button");
    if (checkButton) {
        checkButton.addEventListener("click", function (e) {
            e.preventDefault();
            submitAnswer();
        });
    }

    // スキップボタンにイベントリスナーを追加
    const skipButton = document.getElementById("skip-button");
    if (skipButton) {
        skipButton.addEventListener("click", function (e) {
            e.preventDefault();
            skipQuestion();
        });
    }

    // ヒントボタンにイベントリスナーを追加
    const hintButton = document.getElementById("hint-button");
    if (hintButton) {
        hintButton.addEventListener("click", function (e) {
            e.preventDefault();
            showHint();
        });
    }
});

// 回答送信処理
function submitAnswer() {
    const answerText = document.getElementById("answer-input").value;
    const questionId = document.getElementById("question-id").value;
    const startTime = parseInt(document.getElementById("start-time").value);

    if (!answerText.trim()) {
        alert("回答を入力してください");
        return;
    }

    const timeTaken = Math.floor((Date.now() - startTime) / 1000);

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
            showResult(data);

            // 正解の場合、3秒後に次の問題を表示
            if (data.is_correct) {
                setTimeout(() => {
                    loadNextQuestion();
                }, 3000);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("通信エラーが発生しました");
        });
}

// 次の問題を読み込む
function loadNextQuestion() {
    const currentQuestionId = document.getElementById("question-id").value;

    // 現在のカテゴリーと難易度を取得（URLパラメータから）
    const urlParams = new URLSearchParams(window.location.search);
    const categoryName = urlParams.get("category");
    const difficulty = urlParams.get("difficulty");

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
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                updateQuestionDisplay(data.question);
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("次の問題の読み込みに失敗しました");
        });
}

// 問題表示を更新
function updateQuestionDisplay(question) {
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

    // 問題IDを更新
    document.getElementById("question-id").value = question.id;

    // 開始時間をリセット
    document.getElementById("start-time").value = Date.now();

    // 入力フィールドをクリア
    document.getElementById("answer-input").value = "";

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
}

// 結果表示
function showResult(data) {
    const resultDiv = document.getElementById("result-message");
    if (resultDiv) {
        resultDiv.textContent = data.message;
        resultDiv.className = data.is_correct
            ? "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border border-green-500 bg-green-900/20 text-green-200"
            : "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border border-red-500 bg-red-900/20 text-red-200";
        resultDiv.classList.remove("hidden");
    }
}

// ヒントを表示/非表示切り替え
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

// 問題をスキップ
function skipQuestion() {
    // スキップする場合、次の問題を読み込む
    loadNextQuestion();
}

// エラー表示
function showError(message) {
    const resultDiv = document.getElementById("result-message");
    if (resultDiv) {
        resultDiv.textContent = message;
        resultDiv.className =
            "w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold p-4 rounded-lg border border-red-500 bg-red-900/20 text-red-200";
        resultDiv.classList.remove("hidden");
    }
}
