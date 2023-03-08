// Consts
const mainNav = document.getElementById('mainNav')
const openMainNav = document.getElementById('openMainNav')
const mainNavList = document.getElementById('mainNavList')
const closeMainNav = document.getElementById('closeMainNav')
const mainNavListItems = document.getElementsByClassName('mainNavListItem')

ScrollReveal().reveal("#homeMainTitle", {duration: 1800})
ScrollReveal().reveal("#homeP1", {duration: 1800, delay: 300})
ScrollReveal().reveal("#homeLink1", {duration: 1800, delay: 600})

// Change nav background color on scroll
window.addEventListener('scroll', () => {
    if(window.scrollY > 50) {
        mainNav.style.background = "#000000"
        mainNav.style.boxShadow = "0px 1px 3px 1px rgba(0, 0, 0, 0.31)"
    } else {
        mainNav.style.background = "transparent"
        mainNav.style.boxShadow = "unset"
    }
})

// Event listeners
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