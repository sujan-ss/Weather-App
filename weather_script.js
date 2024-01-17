function getData() {
  fetch(
    `http://sujanshrestha2226673.infinityfreeapp.com/5c6c0cbd402d0e976bb3fc360633033d.php?City=Tameside`
  )
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      showData(data);
    });
}

function showData(data) {
  const nam = data.City;
  const temp = data.Temperature;
  const condi = data.W_Condition;
  const hum = data.Humidity;
  const pre = data.Pressure;
  const wind = data.Wind_Speed;
  const dir = data.W_Direction;
  date = new Date(data.Dt * 1000);
  const dayName = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];

  document.getElementById("city").innerHTML = nam;
  document.getElementById("temperature").innerHTML = Math.floor(temp) + " °C";
  document.getElementById("condition").innerHTML = condi;
  document.getElementById("humidity").innerHTML = "Humidity: " + hum + " %";
  document.getElementById("pressure").innerHTML = "Pressure: " + pre + " hPa";
  document.getElementById("wind_speed").innerHTML =
    "Wind Speed: " + wind + " m/s";
  document.getElementById("direction").innerHTML = "Direction: " + dir + " °";
  document.getElementById("date").innerHTML =
    dayName[date.getDay()] + ", " + date.toDateString().slice(4);

  localStorage.nam = nam;
  localStorage.temp = temp;
  localStorage.condi = condi;
  localStorage.hum = hum;
  localStorage.pre = pre;
  localStorage.wind = wind;
  localStorage.dir = dir;
  localStorage.dt = data.Dt;
  localStorage.when = Date.now();
}

if (
  localStorage.when != null &&
  parseInt(localStorage.when) + 300000 > Date.now()
) {
  console.log("from Local Storage");
  let freshness =
    Math.round((Date.now() - localStorage.when) / 1000) + " second(s)";
  date = new Date(localStorage.dt * 1000);
  const dayName = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];

  document.getElementById("city").innerHTML = localStorage.nam;
  document.getElementById("temperature").innerHTML =
    Math.floor(localStorage.temp) + " °C";
  document.getElementById("condition").innerHTML = localStorage.condi;
  document.getElementById("humidity").innerHTML =
    "Humidity: " + localStorage.hum + " %";
  document.getElementById("pressure").innerHTML =
    "Pressure: " + localStorage.pre + " hPa";
  document.getElementById("wind_speed").innerHTML =
    "Wind Speed: " + localStorage.wind + " m/s";
  document.getElementById("direction").innerHTML =
    "Direction: " + localStorage.dir + " °";
  document.getElementById("date").innerHTML =
    dayName[date.getDay()] + ", " + date.toDateString().slice(4);
} else {
  getData();
}
