/**
 * divs that we will severaly use;
 */

let askInterface = document.querySelector(".ask");
let askedInterface = document.querySelector(".asked");
let textIntervene = document.querySelector(".inter-div");
let codeIntervene = document.querySelector(".code");
let languagesDiv = document.querySelector(".specifc");
const questionContainer = document.querySelector(".container");

/**
 * buttons that we will  severaly use;
 */
let askQuestionBtn = document.querySelector(".ask-question");
let textInterveneBtn = document.querySelectorAll(".intervene-btn");
let codeInterveneBtn = document.querySelector(".code-for-btn");
let sendIterventionsBtn = document.querySelector(".send-iterventions");
let sendCodeIterventionsBtn = document.querySelector(".send-code-iterventions");
let sendQuestion = document.querySelector(".send-question");
/**
 * hiddes the taged element in closes and shows the element taged in open
 * @param {htmlElement} closes
 * @param {htmlElement} opened
 */
const closeOpen = (closes, opened) => {
  closes.classList.add("hidden");
  opened.classList.remove("hidden");
  opened.animate(
    [
      { opacity: 0, transform: "scale(2)" },
      { opacity: 1, transform: "scale(1) " },
    ],
    {
      duration: 300,
    }
  );
};
askQuestionBtn.addEventListener("click", (e) => {
  closeOpen(askedInterface, askInterface);
  let cat = document.querySelector(".categories");
});
sendQuestion.addEventListener("click", (e) => {
  closeOpen(askInterface, askedInterface);
  addQuestion();
});
textInterveneBtn.forEach((element) => {
  element.addEventListener("click", (e) => {
    closeOpen(askedInterface, textIntervene);
  });
});
sendIterventionsBtn.addEventListener("click", (e) => {
  closeOpen(textIntervene, askedInterface);
  let btn = document.querySelectorAll(".intervene-btn");
  console.log(btn);
});
codeInterveneBtn.addEventListener("click", (e) => {
  closeOpen(askedInterface, codeIntervene);
});
sendCodeIterventionsBtn.addEventListener("click", () => {
  closeOpen(codeIntervene, askedInterface);
});
const addQuestion = () => {
  // observer.observe(footer);
  //p=askedInterface.childNodes[1].childNodes[3].childNodes[1];
  //small=askedInterface.childNodes[1].childNodes[3].childNodes[3].childNodes[1];
  //interveneBtn= askedInterface.childNodes[3].childNodes[1];
  //CodeBtn= askedInterface.childNodes[3].childNodes[3];
  let item = document.createElement("div");
  item.classList.add("added");
  item.style.width = "63.2rem";
  item.style.paddingBottom = "10px";
  item.style.paddingTop = "10px";
  item.style.borderBottom = "2px solid grey";
  item.innerHTML = askedInterface.innerHTML;
  item.childNodes[1].childNodes[3].childNodes[1].innerHTML =
    document.querySelector(".intervene-text-area").value;
  let d = new Date();
  d.setTime(d.getTime() + 2 * 60 * 60 * 1000);
  let date = d.toUTCString().split(" ");
  item.childNodes[1].childNodes[3].childNodes[3].childNodes[1].innerHTML =
    date[0] + "/" + date[1] + "/" + date[2] + "/" + date[3] + "/" + date[4];
  questionContainer.insertBefore(item, askedInterface);
  item.childNodes[3].childNodes[1].addEventListener("click", (e) => {
    closeOpen(askedInterface, textIntervene);
  });
  item.childNodes[3].childNodes[3].addEventListener("click", (e) => {
    closeOpen(askedInterface, codeIntervene);
  });
  return item;
};
//the observer
const footer = document.querySelector("footer");
const sideBar = document.querySelector(".sider-bar");
const observer = new IntersectionObserver((observed) => {
  observed.forEach((element) => {
    if (!element.isIntersecting) {
      sideBar.classList.add("fixed");
      element.target.classList.add("mt-96");
      questionContainer.classList.add("ml-72");
    } else {
      sideBar.classList.remove("fixed");
      element.target.classList.remove("mt-96");
      questionContainer.classList.remove("ml-72");
    }
  });
});
