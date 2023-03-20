
// Je veux :
// - récupérer les données du formulaire
const watchSubmit = () => {
    const form = document.querySelector('.js-reservation-submit form')
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        backCall(formData)
    })
}

// - les envoyer à mon back
const backCall = (dataToSend) => {
    console.log('dataToSend', dataToSend)
    fetch('https://127.0.0.1:8000/api', {
        method: "POST",
        body: dataToSend})
    .then((response) => response.json())
    .then((data) => {
        console.log('data', data)
        if (data.status === 'ok') {
            console.log('success')
            document.querySelector('.js-reservation-ok').classList.remove('reservation-success-hide')
            document.querySelector('.js-reservation-ok').classList.add('reservation-success')
            document.querySelector('.js-reservation-submit').classList.remove('resa-form__flux')
            document.querySelector('.js-reservation-submit').classList.add('resa-form-hide')
        }
        else if (data.status === 'nok') {
            console.log('error')
            document.querySelector('.js-reservation-nok').classList.remove('reservation-error-hide')
            document.querySelector('.js-reservation-nok').classList.add('reservation-error')
            document.querySelector('.js-reservation-submit').classList.remove('resa-form__flux')
            document.querySelector('.js-reservation-submit').classList.add('resa-form-hide')
        }
    })
}

watchSubmit()
