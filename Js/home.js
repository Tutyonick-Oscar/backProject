const together = document.querySelector(".together");
const clip = document.querySelector(".clip-container");
const text = document.querySelector(".text");
const one = document.querySelector(".one");
const many = document.querySelector(".many");
const divRigth = document.querySelector(".div-rigth");
let strsDivs = document.querySelectorAll(".strs-divs-children");
const video = document.querySelector(".video");
const rigthOfVideo = document.querySelector(".right-of-video");
let tab = [together, clip, text, one, many, divRigth, video, rigthOfVideo];
for (let el of tab) {
  el.classList.add("unshow");
}
let observer = new IntersectionObserver(
  (observed) => {
    observed.forEach((elmt) => {
      if (elmt.isIntersecting) {
        elmt.target.animate([{ transform: 'scale(0.3)' }, { transform: 'scale(1)' }], {
          duration: 800,
        });
        elmt.target.classList.remove("unshow");
        // observer.unobserve(elmt.target);
      }
    });
  },
  { threshold: 0.5 }
);
tab.forEach((element) => {
  observer.observe(element);
});
let divObserver = new IntersectionObserver(
  (divs) => {
    if (divs[0].isIntersecting) {
      divs[0].target.classList.remove("unshow");
      divs[0].target.animate([{ opacity: 0 }, { opacity: 1 }], {
        duration: 500,
      });
      divObserver.unobserve(divs[0].target);
    }
    if (divs[1].isIntersecting) {
      setTimeout(() => {
        divs[1].target.classList.remove("unshow");
        divs[1].target.animate([{ opacity: 0 }, { opacity: 1 }], {
          duration: 500,
        });
        divObserver.unobserve(divs[1].target);
      }, 500);
    }
    if (divs[2].isIntersecting) {
      setTimeout(() => {
        divs[2].target.classList.remove("unshow");
        divs[2].target.animate([{ opacity: 0 }, { opacity: 1 }], {
          duration: 1000,
        });
        divObserver.unobserve(divs[2].target);
      }, 1000);
    }
  },
  {
    threshold: 0.5,
  }
);
strsDivs.forEach((div) => {
  divObserver.observe(div);
  div.classList.add("unshow");
});
