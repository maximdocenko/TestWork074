document.addEventListener("DOMContentLoaded", function() {
    function fetchCities(query = "") {
        fetch(cities_ajax.ajax_url + "?action=get_cities&query=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                let tableBody = document.querySelector("#cities-table tbody");
                tableBody.innerHTML = "";
                if (data.length === 0) {
                    tableBody.innerHTML = "<tr><td colspan='3'>Города не найдены</td></tr>";
                } else {
                    data.forEach(city => {
                        let row = `<tr>
                            <td>${city.country}</td>
                            <td>${city.city}</td>
                            <td>${city.temperature}°C</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                }
            })
            .catch(error => console.error("Ошибка загрузки данных:", error));
    }

    fetchCities(); // Загружаем все города при загрузке страницы

    document.getElementById("city-search").addEventListener("input", function() {
        fetchCities(this.value);
    });
});
