function $(selector) {
    return document.querySelector(selector);
}

$('#newLevelButton').addEventListener('click', onClick, false);

function onClick(e) {

    var name = $('#name').value;
    var x = $('#x').value;
    var y = $('#y').value;
    var obs = $('#obs').value;

    if (x < 3 || y < 3 || obs > x*y-1) {
        alert('hibás adatok');
        return;
    }
    console.log(name + ' ' + x + ' ' + y + ' ' + obs + ' ');


    var data = new FormData();
    data.append('name', name);
    data.append('x', x);
    data.append('y', y);
    data.append('obs', obs);


    ajax({
        mod: 'POST',
        url: 'http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/index.php/newgame',
        postadat: data/*{
            'name' : name,
            'x' : x,
            'y' : y,
            'obs' : obs
        }*/,
        siker: function (xhr, data) {
            //var newLevel = JSON.parse(data);
            console.log(data);
        },
        hiba: function(xhr){
            console.log('hiba');
        }
    });
}
