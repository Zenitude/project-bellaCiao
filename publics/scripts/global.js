/* Add class 'active' for menu of navigation */
const menus = document.querySelectorAll('header nav ul li a');
const title = document.querySelector('head title').innerHTML;
      
menus.forEach(menu => {

    let value = title.includes('Mot de passe oublié') || title.includes('Inscription') ? 'Connexion' : title.replace('Bella_Ciào | ', '');
    
    if(menu.innerHTML.includes(value))
    {
        menu.classList.add('active');
    }
});

/* Animation hamburger menu */
if(document.querySelector('header nav ul'))
{
    let menuH = document.querySelector('header .menuH');
    let hamburgers = document.querySelectorAll('header .menuH .hamburger')
    let ul = document.querySelector('header nav ul');
    let position;
    
    for(let i = 0 ; i < hamburgers.length ; i++)
    {
        position = switcher(i);

        hamburgers[i].classList.add(`position${position}`);
    }

    menuH.addEventListener('click', () => 
    {
        console.log(hamburgers);
        ul.classList.toggle('block');       
        for(let i = 0 ; i < hamburgers.length ; i++)
        {
            position = switcher(i);
            hamburgers[i].classList.toggle(`position${position}`);

            if(i === 1)
            {
                hamburgers[i].classList.toggle(`hidden${position}`);
            }
            else
            {
                hamburgers[i].classList.toggle(`rotate${position}`);
            }
        }
    });
}

function switcher(index)
{
    switch(index)
    {
        case 0 : position = 'First'; break;
        case 1 : position = 'Middle'; break;
        case 2 : position = 'Last'; break;
    }
    return position;
}

/* Body style height auto if content element with class 'signer' */
if(document.querySelector('.signer'))
{
    document.body.classList.add('autoBody');  
}