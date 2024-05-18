describe('Nuevo producto', () => {
  beforeEach(() => {
    cy.visit('http://gestioninventario/productos/nuevo')
  })

  it('debería mostrar el formulario de creación de producto', () => {
    cy.get('form').should('exist')
    cy.get('#nombre').should('exist')
    cy.get('#cantidad').should('exist')
    cy.get('#descripcion').should('exist')
    cy.get('#fecha_ingreso').should('exist')
    cy.get('#fecha_vencimiento').should('exist')
    cy.get('#precio').should('exist')
    cy.get('#proveedor').should('be.visible');
    cy.get('button[type="submit"]').should('exist')
  })

  it('debería crear un producto correctamente', () => {
    const nombre = 'Máscaras de respiración'
    const cantidad = 80
    const descripcion = ' Máscara completa de presión positiva de altas prestaciones, fabricada con materiales innovadores '
    const fecha_ingreso = '2024-05-18'
    const fecha_vencimiento = '2025-12-31'
    const precio = 100

    cy.get('#nombre').type(nombre)
    cy.get('#cantidad').type(cantidad)
    cy.get('#descripcion').type(descripcion)
    cy.get('#fecha_ingreso').type(fecha_ingreso)
    cy.get('#fecha_vencimiento').type(fecha_vencimiento)
    cy.get('#precio').type(precio)

    // Busca el elemento <select> y verifica que sea visible
    cy.get('#proveedor').select('5', {force: true});

    //------------------------------------------------------
    cy.get('button[type="submit"]').click()
  })
})