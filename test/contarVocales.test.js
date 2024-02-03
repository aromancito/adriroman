const contarVocales = require('../contarVocales');

describe('Test para contar vocales en una cadena', () => {
    test('Cuenta las vocales de una cadena con texto', () => {
        const cadena = 'Hola mundo';
        expect(contarVocales(cadena)).toBe(4);
    });

    test('Devuelve 0 para una cadena vacía', () => {
        const cadena = '';
        expect(contarVocales(cadena)).toBe(0);
    });

    test('Devuelve 0 para una cadena sin vocales', () => {
        const cadena = 'rbc157';
        expect(contarVocales(cadena)).toBe(0);
    });
});
