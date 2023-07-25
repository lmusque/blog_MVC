function getComments(offset, articleId, element) {
	const pageBtns = document.querySelectorAll(".page");
	pageBtns.forEach((btn) => btn.classList.remove("selected"));
	element.classList.add("selected");

	let xhr = new XMLHttpRequest();

	xhr.open("GET", `index.php?action=getCommentsAJAX&article=${articleId}&offset=${offset}`);
	xhr.addEventListener("load", function () {
		listComments.innerHTML = xhr.responseText;
	});
	xhr.send(null);
}
