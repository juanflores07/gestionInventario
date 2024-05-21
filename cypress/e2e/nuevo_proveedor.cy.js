describe('Nuevo proveedor', () => {
  beforeEach(() => {
    cy.visit('http://gestioninventario/proveedores/nuevo')
  })

  it('debería mostrar el formulario de creación de proveedor', () => {
    cy.get('form').should('exist')
    cy.get('#nombre').should('exist')
    cy.get('#nit').should('exist')
    cy.get('#telefono').should('exist')
    cy.get('#direccion').should('exist')
    cy.get('#pais').should('be.visible');
    cy.get('#departamento').should('be.visible');
    cy.get('#municipio').should('be.visible');
    cy.get('button[type="submit"]').should('exist')
  })

  it('debería crear un proveedor correctamente', () => {
    const nombre = 'Proveedor de prueba'
    const nit = '1234-000000-136-9'
    const telefono = '12345678'
    const direccion = 'Dirección de prueba'

    cy.get('#nombre').type(nombre)
    cy.get('#nit').type(nit)
    cy.get('#telefono').type(telefono)
    cy.get('#direccion').type(direccion)

    // Busca el elemento <select> y verifica que sea visible
    cy.get('#pais').select('1', {force: true});

    //------------------------------------------------------

    // Espera a que el contenido del segundo <select> se cargue
    cy.wait(1000);

    // Busca el segundo elemento <select> y verifica que sea visible
    cy.get('#departamento').select('1', {force: true});

    //---------------------------------------------
    // Espera a que el contenido del tercer <select> se cargue
    cy.wait(1000);

    // Busca el tercer elemento <select> y verifica que sea visible
    cy.get('#municipio').select('7', {force: true});

    cy.get('button[type="submit"]').click()
  })
})