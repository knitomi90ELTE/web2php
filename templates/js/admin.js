function $(selector) {
    return document.querySelector(selector);
}

$('#newLevelButton').addEventListener('click', onClick, false);

function onClick(e) {

    var name = $('#name').value;
    var x = $('#x').value;
    var y = $('#y').value;
    var obs = $('#obs').value;

    if (x < 3 || y < 3 || obs > x*y-1 || obs < 0 || name == '') {
        alert('hibás adatok');
        return;
    }
    var data = 'name='+name+'&x='+x+'&y='+y+'&obs='+obs;

    ajax({
        mod: 'POST',
        url: 'http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/index.php/newgame',
        postadat: data,
        siker: function (xhr, data) {
            $('#levelList').innerHTML += generateNewLevel(JSON.parse(data));
            $('#result').innerHTML = 'Sikeres hozzáadás!';
        },
        hiba: function(xhr){
            console.log('hiba');
            $('#result').innerHTML = 'Sikertelen hozzáadás!';
        }
    });
}

function generateNewLevel(content) {
    console.log(content);
    var s = '<li>';
    s += `<div><strong>${content["name"]}</strong></div>`
    s += '<ul>';
    s += `<li>Szélesség: ${content["x"]}</li>`;
    s += `<li>Magasság: ${content["y"]}</li>`;
    s += `<li>Akadályok száma: ${content["obs"]}</li>`;
    s += `<li>Rekord: Még nincs</li>`;
    s += `<li>Saját legjobb: még nincs</li>`;
    s += `</ul><a class="btn btn-success btn-sm" href="game?x=${content.x}&y=${content.y}&obs=${content.obs}">START</a></li>`;
    return s;
}
