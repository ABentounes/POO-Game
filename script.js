class Cercle {
    constructor(rayon) {
        this.rayon = rayon;
    }

    get area() {
        return this.calcArea();
    }

    calcArea() {
        return 2 * 3.14159 * (this.rayon) ** 2;
    }
}

const rond = new Cercle(10);


console.log(rond.area);

class Character {
    constructor() {
        this.name = "Aventurer";
        this.hp = Math.floor(Math.random() * 30 + 1);
        this.damages = Math.floor(Math.random() * 3 + 1);
    }
    // static (a, b);
}



class Assassin extends Character {
    constructor(name, damages) {
        super(name, damages);
        this.name = "Assassin";
        this.damages = Math.floor(Math.random() * 7 + 1);

    }
}

class Warrior extends Character {
    constructor(name, hp) {
        super(name, hp)
        this.name = "Warrior";
        this.hp = Math.floor(Math.random() * 50 + 1);
    }
}


function createCharacter() {
    return new Character();
}

function createAssassin() {
    return new Assassin();
}
function createWarrior() {
    return new Warrior();
}


// console.log("A hp: " + a.hp, "A damages: " + a.damages, "B hp: " + b.hp, "B damages: " + b.damages);

a = createAssassin();
b = createWarrior();
idFight = 0;
fightList = [];
console.log(a.name);
console.log(a.damages);

class fight {
    constructor(a, b, score) {
        this.fighter1 = a;
        this.fighter2 = b;
        this.score = score;
        this.name = `${a.name} vs ${b.name}`
    }
    static trigger(a, b, idFight, fightList) {

        let score = 0;
        while (a.hp > 0 && b.hp > 0) {
            console.log("A hp " + a.hp + "       B hp " + b.hp);
            console.log();
            a.initiative = Math.floor(Math.random() * 99);
            b.initiative = Math.floor(Math.random() * 99);
            if (a.initiative > b.initiative) {
                b.hp = b.hp - a.damages;

            } else {
                a.hp = a.hp - b.damages;
            }

        }
        if (a.hp <= 0) {
            console.log("A a perdu");
            score = 0;
        }
        if (b.hp <= 0) {
            console.log("B a perdu");
            score = 1;
        }
        fightList[idFight] = new fight(a, b, score);
        idFight++;
    }
}

// function fight(a, b) {
//     while (a.hp > 0 && b.hp > 0) {
//         console.log("A hp " + a.hp);
//         console.log("B hp " + b.hp);
//         a.initiative = Math.floor(Math.random() * 99);
//         b.initiative = Math.floor(Math.random() * 99);
//         if (a.initiative > b.initiative) {
//             b.hp = b.hp - a.damages;

//         } else {
//             a.hp = a.hp - b.damages;
//         }

//     }
//     if (a.hp <= 0) {
//         console.log("A a perdu");
//     }
//     if (b.hp <= 0) {
//         console.log("B a perdu");
//     }
// }