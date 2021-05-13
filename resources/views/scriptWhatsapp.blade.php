<script type="text/javascript">
/* 
* Se indentifica si el dispositivo actual es mobile o no y se abre whastapp web 
* con el mesnaje predeterminado y los datos de contacto de emergencia del usuario
*/

function isMobile() {

    if (sessionStorage.desktop)
        return false;
    else if (localStorage.mobile)
        return true;

    var mobile = ['iphone', 'ipad', 'android', 'blackberry', 'nokia', 'opera mini', 'windows mobile', 'windows phone', 'iemobile'];
    for (var i in mobile)
        if (navigator.userAgent.toLowerCase().indexOf(mobile[i].toLowerCase()) > 0) return true;

    return false;
}


const $form = document.querySelector('#form');
const buttonSubmit = document.querySelector('#submit');
const urlDesktop = 'https://web.whatsapp.com/';
const urlMobile = 'whatsapp://';
const phone = '34636902219';

$form.addEventListener('submit', (event) => {
    event.preventDefault()
    buttonSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>'
    buttonSubmit.disabled = true
    setTimeout(() => {
        let phone = document.querySelector('#name').value
        let name = document.querySelector('#name').value
        let lastname = document.querySelector('#lastname').value        
        let message = 'send?phone=' + phone + '&text=Buenas, %0A' + contactoEmergencia + '%0A%0A Eres mi contacto de emergencia en caso de ansiedad.%0A Soy %0A' + name + '%0A'  + lastname + '%0A¿Me puedes llamar?%0A' 
        if (isMobile()) {
            window.open(urlMobile + message, '_blank')
        } else {
            window.open(urlDesktop + message, '_blank')
        }
        buttonSubmit.innerHTML = '<i class="fab fa-whatsapp"></i> Enviar WhatsApp'
        buttonSubmit.disabled = false
    }, 4000);
});
</script>


