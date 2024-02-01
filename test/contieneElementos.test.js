const contieneElemento = require('../contieneElementos');

describe('Test para verificar si existe elemento o no', () => {
    test('El elemento introducido existe', () => {
        const array = ['hola', 'adrian', 'roman'];
        const elemento = 'roman';
        expect(contieneElemento(array, elemento)).toBe(true);
    });
    test('El elemento introducido no existe', () => {
        const array = ['hola', 'adrian', 'roman'];
        const elemento = 'adeu';
        expect(contieneElemento(array, elemento)).toBe(false);
    });
});