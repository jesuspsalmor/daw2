let numeroDia = parseInt(window.prompt(`Introduce número del día de la semana`));

let nombredia = (numeroDia) => {
    switch (numeroDia) {
        case 1:
            return `Lunes`;
        case 2:
            return `Martes`;
        case 3:
            return `Miércoles`;
        case 4:
            return `Jueves`;
        case 5:
            return `Viernes`;
        case 6:
            return `Sábado`;
        case 7:
            return `Domingo`;
        default:
            return "Número incorrecto";
    }
};

let validador = (numeroDia) => {
    if (numeroDia < 1 || numeroDia > 7) {
        return `Número inválido`;
    } else {
        return `El dia  es ${nombredia(numeroDia)}`;
    }
};

window.alert(validador(numeroDia));