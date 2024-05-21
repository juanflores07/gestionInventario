describe('Edición de producto', () => {
  beforeEach(() => {
    // Visitar la página de edición del producto
    cy.visit('http://gestioninventario/productos/editar/4'); // Reemplaza con la URL correcta
  });

  it('Muestra los campos de edición', () => {
    // Verificar que los campos de edición estén presentes en la página
    cy.get('#formEditarProducto').should('exist');
    cy.get('#nombre').should('exist');
    cy.get('#cantidad').should('exist');
    cy.get('#descripcion').should('exist');
    cy.get('#fecha_ingreso').should('exist');
    cy.get('#fecha_vencimiento').should('exist');
    cy.get('#precio').should('exist');
    cy.get('#proveedor').should('exist');
  });

  it('Actualiza la información del producto', () => {
    // Simular la actualización de la información del producto
    cy.get('#nombre').clear().type('Agua y Espuma');
    cy.get('#cantidad').clear().type(30);
    cy.get('#descripcion').clear().type('Agua y espuma (AFFF)');
    cy.get('#fecha_ingreso').clear().type('2024-05-19');
    cy.get('#fecha_vencimiento').clear().type('2025-05-18');;
    cy.get('#precio').clear().type(70);
    
    cy.get('#formEditarProducto').find('#proveedor').invoke('val').then((valorActual) => {
      if (valorActual !== '8') {
        cy.get('form#formEditarProducto').find('#proveedor').select('8', { force: true });
      }
    });

    cy.get('button[type="submit"]').click()
  });
});
