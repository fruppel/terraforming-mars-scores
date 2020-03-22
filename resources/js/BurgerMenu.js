export default class BurgerMenu
{
    /**
     * Constructor
     */
    constructor()
    {
        const burgerMenuToggle = document.getElementById('navbar-main-burger');

        burgerMenuToggle.addEventListener('click', () => {
            const target = document.getElementById(burgerMenuToggle.dataset.target);
            burgerMenuToggle.classList.toggle('is-active');
            target.classList.toggle('is-active');
        });
    }
}
