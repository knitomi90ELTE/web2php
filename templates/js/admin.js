function $(selector) {
    return document.querySelector(selector);
}

$('#newLevelButton').addEventListener('click', onClick, false);

function onClick(e) {

    var name = $('#name').value;
    var x = $('#x').value;
    var y = $('#y').value;
    var obs = $('#obs').value;

    if (x < 3 || y < 3 || obs > x*y-1 || name == '') {
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
        },
        hiba: function(xhr){
            console.log('hiba');
        }
    });
}

function generateNewLevel(content) {
    console.log(content);
    var s = '<li><ul>';
    s += `<li>Név: ${content["name"]}</li>`;
    s += `<li>Szélesség: ${content["x"]}</li>`;
    s += `<li>Magasság: ${content["y"]}</li>`;
    s += `<li>Akadályok száma: ${content["obs"]}</li>`;
    s += `<li>Max pont: ${content["highscore"]}</li>`;
    s += `<li>Legtöbb pontot elért: ${content["recorder"]}</li>`;
    s += `</ul><a class="btn btn-success btn-xs" href="game?x=${content.x}&y=${content.y}&obs=${content.obs}">START</a></li>`;
    return s;
}
