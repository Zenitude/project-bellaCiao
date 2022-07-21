if(document.querySelector('.signer'))
{
    document.body.classList.add('autoBody');  
}

if(document.querySelector('header nav ul'))
{
    let menuH = document.querySelector('header .menuH');
    let hamburgers = document.querySelectorAll('header .menuH .hamburger')
    let ul = document.querySelector('header nav ul');

    hamburgers[0].classList.add('positionFirst');
    hamburgers[1].classList.add('positionMiddle');
    hamburgers[2].classList.add('positionLast');

    menuH.addEventListener('click', () => 
    {
        ul.classList.toggle('block');
        
        hamburgers[0].classList.toggle('positionFirst');
        hamburgers[0].classList.toggle('rotateFirst');

        hamburgers[1].classList.toggle('positionMiddle');
        hamburgers[1].classList.toggle('hiddenMiddle');

        hamburgers[2].classList.toggle('positionLast');
        hamburgers[2].classList.toggle('rotateLast');
    });

}