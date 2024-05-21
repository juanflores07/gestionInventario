describe('Eliminar producto', () => {
  beforeEach(() => {
    cy.visit('http://gestioninventario/productos/editar/17')
  })

  it('debería mostrar el formulario de edición de producto. En la parte inferior se encuentra el botón de eliminar', () => {
    cy.get('#btnBorrar').should('exist')
  })

  it('debería eliminar el producto correctamente', () => {

    // Simular el clic en el botón de eliminar
    cy.get('#btnBorrar').click()

    // Verificar que aparece el modal de confirmación
    cy.get('.swal2-container').should('exist')

    // Aceptar la confirmación
    cy.get('.swal2-confirm').click()
  })
})