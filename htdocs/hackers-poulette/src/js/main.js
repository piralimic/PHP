document.addEventListener('DOMContentLoaded', function() {
  var options = {
    data: {
      "Albania": 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/100px-Flag_of_Albania.svg.png',
      "Andorra": 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Andorra.svg/100px-Flag_of_Andorra.svg.png',
      "Armenia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_Armenia.svg/100px-Flag_of_Armenia.svg.png',
      "Austria": 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_Austria.svg/100px-Flag_of_Austria.svg.png',
      "Azerbaijan": 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Azerbaijan.svg/100px-Flag_of_Azerbaijan.svg.png',
      "Belarus": 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Flag_of_Belarus.svg/100px-Flag_of_Belarus.svg.png',
      "Belgium": 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Flag_of_Belgium.svg/100px-Flag_of_Belgium.svg.png',
      "Bosnia and Herzegovina": 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bosnia_and_Herzegovina.svg/100px-Flag_of_Bosnia_and_Herzegovina.svg.png',
      "Bulgaria": 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Bulgaria.svg/100px-Flag_of_Bulgaria.svg.png',
      "Croatia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/100px-Flag_of_Croatia.svg.png',
      "Cyprus": 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Cyprus.svg/100px-Flag_of_Cyprus.svg.png',
      "Czech Republic": 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/100px-Flag_of_the_Czech_Republic.svg.png',
      "Denmark": 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/100px-Flag_of_Denmark.svg.png',
      "Estonia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Flag_of_Estonia.svg/100px-Flag_of_Estonia.svg.png',
      "Finland": 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Finland.svg/100px-Flag_of_Finland.svg.png',
      "France": 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/100px-Flag_of_France.svg.png',
      "Georgia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Georgia.svg/100px-Flag_of_Georgia.svg.png',
      "Germany": 'https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/100px-Flag_of_Germany.svg.png',
      "Greece": 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Greece.svg/100px-Flag_of_Greece.svg.png',
      "Hungary": 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_Hungary.svg/100px-Flag_of_Hungary.svg.png',
      "Iceland": 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Iceland.svg/100px-Flag_of_Iceland.svg.png',
      "Ireland": 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Flag_of_Ireland.svg/100px-Flag_of_Ireland.svg.png',
      "Italy": 'https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/100px-Flag_of_Italy.svg.png',
      "Kazakhstan": 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kazakhstan.svg/100px-Flag_of_Kazakhstan.svg.png',
      "Latvia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Flag_of_Latvia.svg/100px-Flag_of_Latvia.svg.png',
      "Liechtenstein": 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Flag_of_Liechtenstein.svg/100px-Flag_of_Liechtenstein.svg.png',
      "Lithuania": 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Flag_of_Lithuania.svg/100px-Flag_of_Lithuania.svg.png',
      "Luxembourg": 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Flag_of_Luxembourg.svg/100px-Flag_of_Luxembourg.svg.png',
      "Malta": 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Malta.svg/100px-Flag_of_Malta.svg.png',
      "Moldova": 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Moldova.svg/100px-Flag_of_Moldova.svg.png',
      "Monaco": 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Flag_of_Monaco.svg/100px-Flag_of_Monaco.svg.png',
      "Montenegro": 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Montenegro.svg/100px-Flag_of_Montenegro.svg.png',
      "Netherlands": 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/100px-Flag_of_the_Netherlands.svg.png',
      "North Macedonia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Flag_of_North_Macedonia.svg/100px-Flag_of_North_Macedonia.svg.png',
      "Norway": 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/100px-Flag_of_Norway.svg.png',
      "Poland": 'https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Flag_of_Poland.svg/100px-Flag_of_Poland.svg.png',
      "Portugal": 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/100px-Flag_of_Portugal.svg.png',
      "Romania": 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Romania.svg/100px-Flag_of_Romania.svg.png',
      "Russia": 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f3/Flag_of_Russia.svg/100px-Flag_of_Russia.svg.png',
      "San Marino": 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Flag_of_San_Marino.svg/100px-Flag_of_San_Marino.svg.png',
      "Serbia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Flag_of_Serbia.svg/100px-Flag_of_Serbia.svg.png',
      "Slovakia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Flag_of_Slovakia.svg/100px-Flag_of_Slovakia.svg.png',
      "Slovenia": 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Flag_of_Slovenia.svg/100px-Flag_of_Slovenia.svg.png',
      "Spain": 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/100px-Flag_of_Spain.svg.png',
      "Sweden": 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/Flag_of_Sweden.svg/100px-Flag_of_Sweden.svg.png',
      "Switzerland": 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/100px-Flag_of_Switzerland.svg.png',
      "Turkey": 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Turkey.svg/100px-Flag_of_Turkey.svg.png',
      "Ukraine": 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/100px-Flag_of_Ukraine.svg.png',
      "United Kingdom": 'https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/100px-Flag_of_the_United_Kingdom.svg.png',
      "Vatican City": 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_the_Vatican_City.svg/100px-Flag_of_the_Vatican_City.svg.png'
    }
  };
  var elems = document.querySelectorAll('.autocomplete');
  var instances = M.Autocomplete.init(elems, options);
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
});
