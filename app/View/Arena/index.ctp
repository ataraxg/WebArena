<html>
    
    <div>
        <div class='row'>
            <div class='large-12 columns'>
                <div class="bandeau">
                <?php echo $this->Html->image('geekfight.jpg', array('alt' => 'CakePHP', 'height' => '100%')); ?> 
                </div>
            </div>
        </div>

        <div class ='Rules'>
            <h1>Règles du jeu</h1>

        <p>
            <ul> Un combattant se trouve dans une arène en damier à une position X,Y. Cette position ne peut pas se trouver hors des dimension de l'arène. Un seul combattant par case. Une arène par site.</ul>
            <ul> Un combattant commence avec les caractéristiques suivantes : vue= 0, force=1, point de vie=3. Il apparaît à une position aléatoire libre.</ul>
            <ul> Constantes paramétrées et valeurs de livraison : largeur (x) de l'arène (15), longueur (y) de l'arène (10).</ul>
            <ul> La caractéristique de vue détermine à quelle distance (de Manhattan = x+y) un combattant peut voir. Ainsi seuls les combattants et les éléments du décor à portée sont affichés sur la page concernée. 0 correspond à la case courante.</ul>
            <ul> La caractéristique de force détermine combien de point de vie perd son adversaire quand le combattant réussit son action d'attaque..</ul>
            <ul> Lorsque le combattant voit ses points de vie atteindre 0, il est retiré du jeu. Un joueur dont le combattant a été retiré du jeu est invité à en recréer un nouveau.</ul>
            <ul> Une action d'attaque réussit si une valeur aléatoire entre 1 et 20 (d20) est supérieur à un seuil calculé comme suit : 10 + niveau de l'attaqué - niveau de l'attaquant.</ul>
            <ul> Progression : à chaque attaque réussie le combattant gagne 1 point d'expérience. Si l'attaque tue l'adversaire, le combattant gagne en plus autant de points d'expériences que le niveau de
            l'adversaire vaincu. Tous les 4 points d'expériences, le combattant change de niveau et peut choisir d'augmenter une de ses caractéristiques : vue +1 ou force+1 ou point de vie+3.</ul>
            <ul> Chaque action provoque la création d'un événement avec une description claire. Par exemple : « jonh attaque bill et le touche ».</ul>
        </p>
        </div>
    </div>
    
</html>