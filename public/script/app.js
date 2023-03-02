// Consts

const openMainNav = document.getElementById('openMainNav')
const mainNavList = document.getElementById('mainNavList')
const closeMainNav = document.getElementById('closeMainNav')
const mainNavListItems = document.getElementsByClassName('mainNavListItem')

openMainNav.addEventListener('click', () => {
    mainNavList.style.left = "0px"
})

closeMainNav.addEventListener('click', () => {
    mainNavList.style.left = "-100vw"
})

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