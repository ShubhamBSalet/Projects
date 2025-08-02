const cloud_pct = document.getElementById("cloud_pct")
const feels_like = document.getElementById("feels_like")
const humidity = document.getElementById("humidity")
const max_temp = document.getElementById("max_temp")
const min_temp = document.getElementById("min_temp")
const sunrise = document.getElementById("sunrise")
const sunset = document.getElementById("sunset")
const temp = document.getElementById("temp")
const wind_degrees = document.getElementById("wind_degrees")
const wind_speed = document.getElementById("wind_speed")
const submit = document.getElementById("check")
const city = document.getElementById("city")

document.getElementById("mycity").innerText = city.value

const option = {
    method: 'GET',
    headers: {
        'X-RapidAPI-Key': 'a7662435cdmsh1cd70e27d153e72p1ba8f5jsn996a135e56f1',
        'X-RapidAPI-Host': 'weather-by-api-ninjas.p.rapidapi.com'
    }
}
let a = city.value
mycity.innerHTML.a


const getWether = (city) => {

    
    fetch('https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city'+city, option)
        .then(response => response.json())
        .then(response => {

            console.log(response)

            cloud_pct.innerHTML = response.cloud_pct
            feels_like.innerHTML = response.feels_like
            humidity.innerHTML = response.humidity
            max_temp.innerHTML = response.max_temp
            min_temp.innerHTML = response.min_temp
            sunrise.innerHTML = Date(response.sunrise)
            sunset.innerHTML = response.sunset
            temp.innerHTML = response.temp
            wind_degrees.innerHTML = response.wind_degrees
            wind_speed.innerHTML = response.wind_speed

        })
        .catch(error => console.error(error))

}

submit.addEventListener("click", (e) => {

    e.preventDefault()
    getWether(city.value)
})

getWether("Delhi")
