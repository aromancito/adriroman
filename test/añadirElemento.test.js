const anadirElemento = require('../añadirElemento');

describe('Test para comprobar si se añade elemento: ', () => {
    test('Elemento añadido correctmente', () => {
        const array = [];
        const elemento = 'adrian';
        expect(anadirElemento(array, elemento)).toContain(elemento);
    });
});