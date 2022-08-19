const sort = document.querySelector("#sort");
sort.addEventListener(EventNames.CHANGE, sortChangeHandler);

function sortChangeHandler(evt){
    window.location.href = "index.php?page=movies&sort=" + sort.value;
}