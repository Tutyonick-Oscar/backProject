import "./bootstrap";
//base.blade.php file
const inputSearch = document.querySelector(".input-search");
const xButton = document.querySelector(".x-button");
xButton.addEventListener("click", (e) => {
    inputSearch.value = inputSearch.defaultValue;
});
//index.blade.php file
let descript = document.querySelectorAll(".litle-descript");
descript.forEach((desc) => {
    if (desc.textContent.length > 102) {
        desc.textContent = desc.textContent.substring(0, 102);
    }
});
let timer = document.querySelectorAll(".date");
timer.forEach((dates) => {
    if (dates.textContent.includes("Min")) {
        let i = 0;
        let number = dates.textContent.trim().substring(0, 2);
        setInterval(() => {
            i++;
            dates.textContent = parseInt(number) + i + " Min ago";
            if (number > 59) {
                clearInterval();
            }
        }, 60000);
    }
});
//ask.blade.php file
const textArea = document.querySelector(".text-area");
try {
    textArea.addEventListener(
        "click",
        (e) => {
            textArea.value = "";
        },
        { once: true }
    );
} catch (e) {
    console.log(e.message);
}

const techDetails = document.querySelector(".tech-details");
try {
    techDetails.addEventListener(
        "click",
        (e) => {
            techDetails.value = "";
        },
        { once: true }
    );
} catch (error) {
    console.log(error.message);
}
//profil.blade.php file
const a = document.querySelector(".profil-link");
try {
    a.addEventListener(
        "click",
        (e) => {
            e.preventDefault();
            navigator.clipboard
                .writeText(a.attributes.href.value)
                .then(() => {
                    alert(`copied`);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        false
    );
} catch (error) {
    console.log(error);
}
