const aMayusculas = require('../aMayusculas');

describe('Test de conversió a majuscules en aMayusculas.test.js', () => {
    test('Converteix la cadena correctament a majuscules', () => {
        expect(aMayusculas('adrian')).toBe('ADRIAN');
    });
    test('No converteix la cadena correctament a majuscules', () => {
        expect(aMayusculas('')).toBe('');
        expect(aMayusculas('135')).toBe('135');
        expect(aMayusculas('Adrian')).not.toBe('adrian');
    });
});