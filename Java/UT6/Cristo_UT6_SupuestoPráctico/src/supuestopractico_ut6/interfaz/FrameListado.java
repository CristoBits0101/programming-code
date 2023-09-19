/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package supuestopractico_ut6.interfaz;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;
import javax.swing.*;
import supuestopractico_ut6.SupuestoPractico_UT6;
import supuestopractico_ut6.files_controller.*;



/**
 *
 * @author Cristo Pérez Suárez
 */
public class FrameListado extends javax.swing.JFrame {

    /**
     * Creates new form FrameListado
     */
    public FrameListado() {
        initComponents();
        img_jframe();
        //Ponemos el titulo a la ventana para que aparezca en la cabecera
        this.setTitle("BBVA del pueblo");
        //La ventana siempre aparecerá en el centro
        this.setLocationRelativeTo(null);
        //Llamamos al procedimiento que nos muestra la informacion en el JTextAreaa
        listarClientes();
        //Al cerra la ventana llamamos al Binwriter para escribir los datos del objeto cliente
        this.addWindowListener(new WindowAdapter() {
            public void windowClosing(WindowEvent e) {
                //Pasamos un mensaje al metodo que escribe en el log
                logWriter.writingInFile("Programa finalizado -> "+SupuestoPractico_UT6.obtFecha());
               //Llamamos a escrituaBinario para proceder a meter los datos dentro del fichero
                BinWriter.escrituraBinario();             
                System.exit(0);

            }
        });        
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTextArea1 = new javax.swing.JTextArea();
        jLabel6 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        button_volver = new javax.swing.JButton();
        jLabel10 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(255, 255, 255));

        jLabel1.setIcon(new javax.swing.ImageIcon("C:\\Users\\Jorge lap\\Desktop\\PRO\\Tema 6\\supuestoPractico_UT6\\src\\supuestopractico_ut6\\interfaz\\img\\dondeQuieras.png")); // NOI18N

        jTextArea1.setColumns(20);
        jTextArea1.setRows(5);
        jScrollPane1.setViewportView(jTextArea1);

        jLabel6.setBackground(new java.awt.Color(255, 255, 255));
        jLabel6.setFont(new java.awt.Font("Calibri", 0, 36)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(153, 153, 153));
        jLabel6.setText("Listado Usuarios");
        jLabel6.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        jLabel6.setIconTextGap(5);

        jLabel11.setIcon(new javax.swing.ImageIcon("C:\\Users\\Jorge lap\\Desktop\\PRO\\Tema 6\\supuestoPractico_UT6\\src\\supuestopractico_ut6\\interfaz\\img\\BBVA-Logo-wide.png")); // NOI18N

        button_volver.setBackground(new java.awt.Color(57, 104, 158));
        button_volver.setFont(new java.awt.Font("Calibri", 1, 12)); // NOI18N
        button_volver.setForeground(new java.awt.Color(255, 255, 255));
        button_volver.setBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED));
        button_volver.setBorderPainted(false);
        button_volver.setFocusPainted(false);
        button_volver.setLabel("Volver");
        button_volver.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                button_volverActionPerformed(evt);
            }
        });

        jLabel10.setFont(new java.awt.Font("Calibri Light", 0, 16)); // NOI18N
        jLabel10.setForeground(new java.awt.Color(18, 18, 18));
        jLabel10.setText("No te cobraremos por ver el listado, aprovecha");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap(26, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 312, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(2, 2, 2))
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel6)
                                .addGap(39, 39, 39))
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(button_volver, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(86, 86, 86))
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel10, javax.swing.GroupLayout.PREFERRED_SIZE, 309, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)))
                        .addComponent(jLabel1)
                        .addGap(15, 15, 15))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel11)
                        .addGap(98, 98, 98))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(jLabel11)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(jLabel1))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(54, 54, 54)
                        .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, 39, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(button_volver)
                        .addGap(18, 18, 18)
                        .addComponent(jLabel10, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 54, Short.MAX_VALUE)))
                .addContainerGap(32, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void button_volverActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_button_volverActionPerformed
        //Creamos un objeto de la ventana a la que queremos acceder y lo llamamos c
        FrameInicio i = new FrameInicio();
        //La hacemos visible
        i.setVisible (true);
        //Dejamos de ver la ventana en la que estamos
        this.setVisible(false);
    }//GEN-LAST:event_button_volverActionPerformed
    

    //Icono de la ventana
    private void img_jframe(){
        ImageIcon imgIcon = new ImageIcon("..\\supuestoPractico_UT6\\src\\supuestopractico_ut6\\interfaz\\img/bbva_icon.png");
        this.setIconImage(imgIcon.getImage());      
    }  

    //Mostramos los datos de los clientes en el jtextarea
    public void listarClientes(){
        //Recorremos el ojeto y utilizamos el .append() para mostrar los datos.
         for (int i=0; i<SupuestoPractico_UT6.cliente.size(); i++){
             //Metodo .append() importante para mostar los datos en el TextArea.
             jTextArea1.append("Cliente"+(i+1)+"-> "+SupuestoPractico_UT6.cliente.get(i).getNombre()+" "
                                    +SupuestoPractico_UT6.cliente.get(i).getApellidos()+" DNI: "
                                    +SupuestoPractico_UT6.cliente.get(i).getDNI()+" Cuenta "
                                    +SupuestoPractico_UT6.cliente.get(i).getCuenta()+" -> "
                                    +SupuestoPractico_UT6.cliente.get(i).getSaldo()+"€ \n");
        }
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton button_volver;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextArea1;
    // End of variables declaration//GEN-END:variables
}
