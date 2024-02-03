const esCorreoValido = require('../esCorreoValido');

describe('Test validacion correo: ', () => {
    test('El correo es valido', () => {
        const correo = 'adriaromanmartin@gmail.com';
        expect(esCorreoValido(correo)).toBe(true);
    });
    test('El correo sin @ no es valido', () => {
        const correo = 'adriaromanmartingmail.com';
        expect(esCorreoValido(correo)).toBe(false);
    });
    test('El correo sin dominio no es valido', () => {
        const correo = 'adriaromanmartin@gmail';
        expect(esCorreoValido(correo)).toBe(false);
    });
});