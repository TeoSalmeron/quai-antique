// Consts
const mainNav = document.getElementById('mainNav')
const openMainNav = document.getElementById('openMainNav')
const mainNavList = document.getElementById('mainNavList')
const closeMainNav = document.getElementById('closeMainNav')
const mainNavListItems = document.getElementsByClassName('mainNavListItem')
const confirmAllergy = document.getElementById('confirmAllergy')
const noAllergy = document.getElementById('noAllergy')
const listAllergies = document.getElementById('form_allergies')
const createAccountError = document.getElementById("createAccountError")
const imgBoxes = document.getElementsByClassName("image_box")

// ScrollReveals

ScrollReveal().reveal(".sequenced", { interval: 300, duration: 2500})

// Event listeners

    // Toggle nav bar

    openMainNav.addEventListener('click', () => {
        // Display nav list
        mainNavList.style.left = "0px"

        // Disable scroll
        document.body.style.height = "100%"
        document.body.style.overflow = "hidden"

        // Remove nav bar
        mainNav.style.background = "unset"
        mainNav.style.boxShadow = "unset"
    })

    // Close nav bar

    closeMainNav.addEventListener('click', () => {
        // Remove navbar list
        mainNavList.style.left = "-100vw"

        // Enable scroll
        document.body.style.height = "unset"
        document.body.style.overflow = "unset"

        // Display nav bar
        mainNav.style.background = "#000000"
        mainNav.style.boxShadow = "0px 1px 3px 1px rgba(0, 0, 0, 0.31)"
    })

    // Hover effect on nav items
    for (let item of mainNavListItems) {
        item.addEventListener('mouseenter', (e) => {
            e.target.classList.add("onHover")
            for(let item2 of mainNavListItems) {
                if(!item2.classList.contains("onHover")) {
                    item2.style.color = "lightgray"
                } else {
                    item2.style.color = "black"
                }
            }
        })
        item.addEventListener('mouseleave', (e) => {
            e.target.classList.remove("onHover")
            for(let item2 of mainNavListItems) {
                item2.style.color = "black"
            }
        })
    }

    // Toggle allergies list

    confirmAllergy.addEventListener('input', () => {
        if(confirmAllergy.checked) {
            listAllergies.style.display = "flex"
        }
    })

    // Remove allergies list
    noAllergy.addEventListener('input', () => {
        if(noAllergy.checked) {
            listAllergies.style.display = "none"
        }
    })

    // Display home images title

