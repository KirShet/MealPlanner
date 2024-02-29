document.addEventListener('DOMContentLoaded', function(){
    document.addEventListener('submit', function(e) {
      if (e.target.classList.contains('heart_form')) {
        e.preventDefault();

        formSend(e);
      }});

      async function formSend(e) {
        console.log(e.srcElement);
        let form = e.srcElement;
        let formData = new FormData(form);
        let response = await fetch('action/send_menu2.php',{
          method: 'POST',
          body: formData
        });
        if(response.ok){
          let result = await response.json();
          console.log(result[0][1]);
          let dishElement = form.closest('.dish');
          console.log(dishElement);
          dishElement.innerHTML = `<p>Блюдо ${result[0][1]}</p>`;
        //   location.reload();
        }
      }
    })