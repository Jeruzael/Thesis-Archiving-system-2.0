

let borrowTitles = document.getElementById("Title");
let borrowAuthor = document.getElementById("Author");
let borrowCategory = document.getElementById("Category");
let borrowAbstract = document.getElementById("Abstract");
let borrowPublished = document.getElementById("publish");
let borrowAd = document.getElementById("Professors");

let adBorrowId = document.getElementById("bookId");
let adBorrowTitles = document.getElementById("editTitle");
let adBorrowAuthor = document.getElementById("editAuthor");
let adBorrowCategory = document.getElementById("editCategory");
let adBorrowAbstract = document.getElementById("editAbstract");
let adBorrowPublished = document.getElementById("editPublish");
let adBorrowAd = document.getElementById("editProfessors");
let adBorrowProg = document.getElementById("editProgram");

let search = document.getElementById("enrollies");

function sbt(){
	borrowTitles.value = book.bookTitle;		
}


const book = {	
	sdb: function(id){
		//return id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4];
		borrowTitles.value = id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent;
		this.getBookAuthor(id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent);
		this.getBookCategory(id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent);
		this.getBookAbstract(id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent);
		this.getBookPublished(id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent);
		this.getBookProfessors(id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4].textContent);

		
	},

	getBookAuthor: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			borrowAuthor.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "test.php?q=" + auth);
		author.send();
	},

	getBookCategory: function(cat){
		const author = new XMLHttpRequest();
		author.onload = function(){
			borrowCategory.childNodes[1].value = this.responseText;
			console.log("Category: "+ borrowCategory.childNodes[1].value);
		}
		author.open("GET", "category.php?q=" + cat);
		author.send();
	},

	getBookAbstract: function(abs){
		const author = new XMLHttpRequest();
		author.onload = function(){
			borrowAbstract.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "abstract.php?q=" + abs);
		author.send();
	},

	getBookPublished: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			borrowPublished.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "publish.php?q=" + auth);
		author.send();
	},
	getBookProfessors: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			borrowAd.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "professor.php?q=" + auth, true);
		author.send();
	},
};



const request = {
	testThis: function(id){
		id.parentNode.parentNode.childNodes[1].style.background = "red";
	},

	getRequestId: function(id){
		//id.parentNode.parentNode.childNodes[1].textContent;
		let Id = id.parentNode.parentNode.childNodes[1].textContent;
		const reqId = new XMLHttpRequest();
		reqId.onload = function(){
			//alert(this.responseText);
		}

		reqId.open("GET","test.php?id=" + Id, true);
		reqId.send();
	}

};

const adminBook = {	
	test: function(id){
		alert(id.parentNode.parentNode.childNodes[3].textContent);
	},

	sdb: function(id){
		//return id.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[4];
		adBorrowTitles.value = id.parentNode.parentNode.childNodes[3].textContent;
		this.getBookId(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookAuthor(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookCategory(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookAbstract(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookPublished(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookProfessors(id.parentNode.parentNode.childNodes[3].textContent);
		this.getBookProgram(id.parentNode.parentNode.childNodes[3].textContent);
		//alert(id.parentNode.parentNode.childNodes[1].textContent);
		
	},

	getBookId: function(id){
		const author = new XMLHttpRequest();
		author.onload = function(){
			adBorrowId.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "_id.php?q=" + id);
		author.send();
	},
	
	getBookAuthor: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			adBorrowAuthor.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "_author.php?q=" + auth);
		author.send();
	},

	getBookCategory: function(cat){
		const author = new XMLHttpRequest();
		author.onload = function(){

			switch(this.responseText){
				case "Desktop App":
					adBorrowCategory.childNodes[1].setAttribute("selected", "true");
				break;
				case "Mobile App":
					adBorrowCategory.childNodes[3].setAttribute("selected", "true");
				break;
				case "Website":
					adBorrowCategory.childNodes[5].setAttribute("selected", "true");
				break;				
			}			
		}
		author.open("GET", "_category.php?q=" + cat);
		author.send();
	},

	getBookProgram: function(prog){
		const author = new XMLHttpRequest();
		author.onload = function(){			

			switch(this.responseText){
				case "BSCS":
					adBorrowProg.childNodes[1].setAttribute("selected", "true");
				break;
				case "BSIS":
					adBorrowProg.childNodes[3].setAttribute("selected", "true");
				break;
				case "BSIT":
					adBorrowProg.childNodes[5].setAttribute("selected", "true");
				break;
				case "BSEMC":
					adBorrowProg.childNodes[7].setAttribute("selected", "true");
				break;
			}
		}
		author.open("GET", "_course.php?q=" + prog);	
		author.send();
	},	

	getBookAbstract: function(abs){
		const author = new XMLHttpRequest();
		author.onload = function(){
			adBorrowAbstract.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "_abstract.php?q=" + abs);
		author.send();
	},

	getBookPublished: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			adBorrowPublished.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "_publish.php?q=" + auth);
		author.send();
	},
	getBookProfessors: function(auth){
		const author = new XMLHttpRequest();
		author.onload = function(){
			adBorrowAd.value = this.responseText;
			console.log("work: "+ this.responseText);
		}
		author.open("GET", "_prof.php?q=" + auth, true);
		author.send();
	},
};

const addStudent = {
	getEnrolledStud: function(txt){
		
		const enrolled = new XMLHttpRequest();
		enrolled.onload = function(){
			search.innerHTML = this.responseText;
			console.log(txt.value);
		}
		enrolled.open("GET","testSearch.php?q=" + txt.value, true);
		enrolled.send();
	}
};


