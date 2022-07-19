if(document.querySelector('.signer'))
{
    let signer = document.querySelector('.signer');
    let parentSigner = signer.parentNode.parentNode.parentNode.parentNode;
    
    parentSigner.classList.add('autoBody');
}