var inputsearch = document.querySelector(".inputsearch");
inputsearch.addEventListener("keydown", (event) => {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.querySelector(".formsearch").submit(); // Gửi form
    }
});
