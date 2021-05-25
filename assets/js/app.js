function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
     
     
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
  
  function clickbutton() {
    const btn = document.getElementById("button");
    btn.addEventListener('click', function(){
      document.getElementsById("formulaire").style.hidden = none;
    })
  }
  
  let modal = null
  
  const openModal = async function (e) {
    e.preventDefault()
    const target = e.target.getAttribute('href')
    if (target.startsWith('#')) {
      modal = document.querySelector(target)
    }else{
      modal = await loadModal(target)
    }
    
    modal.style.display = null
    modal.removeAttribute('aria-hiden')
    modal.setAttribute('arial-modal', 'true')
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
  }
  
  const closeModal = function (e) {
    if (modal === null) return
    e.preventDefault()
    modal.style.display = "none"
    modal.setAttribute('aria-hiden', 'true')
    modal.removeAttribute('arial-modal')
    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    modal = null
  }
  const stopPropagation = function (e){
    e.stopPropagation()
  }
  
  document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
    
  })
  
  window.addEventListener('keydown', function (e){
    if (e.key === "Escape" || e.key === "Esc"){
      closeModal(e)
    }
  })
  
  const loadModal = async function(url){
    const target = '#'+ url.split('#')[1]
    const html = await fetch(url).then(response => response.text())
    const element = document.createRange().createContextualFragment(html).querySelector(target)
    if (element === null) throw `L'élément $(target) n'a pas éte trouvé dans ${url}`
    document.body.append(element)
    return element
  }


//                                  Ajax

let form = document.getElementsByTagName("form")
for (var i = 0 ; i < form.length; i++) {
  form[i].addEventListener("submit", function(e){
    e.preventDefault()

    var data = new FormData(this)

    var xhr = new XMLHttpRequest()

    xhr.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        
        var res = this.response
        //console.log(res)
        if (res.success){
          alert(res.msg)
        }else{
          alert(res.msg)
        }
      }else if (this.readyState == 4){
        alert('une erreur est survenue...')
      }
    }

    xhr.open("POST", "Php/form.php", true)
    xhr.responseType = "json";
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(data)

    return false
})
}