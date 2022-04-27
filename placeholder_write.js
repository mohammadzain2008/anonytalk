let title = document.getElementById('title')
let area = document.getElementById('msg')
title.addEventListener("click", ()=>{
    area.style.border = "1.3px solid gray"
    title.style.border = "1.3px solid #e5439f"
})

area.addEventListener("click", ()=>{
    title.style.border = "1.3 px solid gray"
    area.style.border = "1.3px solid #e5439f"
})