function mealvalidated() {
    var meal1 = form1.meal.value;

    if (meal1 == waiting) {
        alert("please waiting for next meal time");
        form1.name.focus();
    }
}