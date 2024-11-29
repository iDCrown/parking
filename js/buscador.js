
document.addEventListener('DOMContentLoaded', function() { 

    document.querySelector("#buscador").addEventListener("keyup", e => {
        if(e.target.matches("#buscador")){
            console.log(e.target.value)
            document.querySelectorAll(".item").forEach( t =>{
                t.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ? t.style.display = ""
                : t.style.display = "none"
            })
        }
    })
})

  