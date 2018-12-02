
            <br />
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <label for="select_file_privs">Options du système de fichiers:</label>
                <select class="form-control" id="file_privs" name="file_privs">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_file_read_data_form', 1); divHideAndSeek('display_file_write_data_form', 1);">Aucun</option>
                  <option value="r" onClick="divHideAndSeek('display_file_read_data_form', 0); divHideAndSeek('display_file_write_data_form', 1);">Lire les fichiers de la DB</option>
                  <option value="w" onClick="divHideAndSeek('display_file_write_data_form', 0); divHideAndSeek('display_file_read_data_form', 1);">Envoyer un Payload vers la BD</option>
                </select>
                <div id="display_file_read_data_form" align="central" style="display: none">
                  <br />
                  <label for="file_read">Fichier à lire:</label>
                  <input type="text" class="form-control" id="file_read" name="rFile" placeholder="i.e. /etc/passwd or c:/windows/win.ini ">
                  <br />
                </div>
                <div id="display_file_write_data_form" align="central" style="display: none">
                  <br />
                  <label for="file_write">Fichier à écrire:</label>
                  <select class="form-control" id="file_write" name="file_write">
                    <option value="cmdShell" selected="selected" onClick="divHideAndSeek('display_file_write_revShell_data_form', 1);">Commandes Shell</option>
                    <option value="uploader" onClick="divHideAndSeek('display_file_write_revShell_data_form', 1);">Envois de fichier</option>
                    <option value="revShell" onClick="divHideAndSeek('display_file_write_revShell_data_form', 0);" disabled>Reverse Shell</option>
                  </select>
                  <br />
                  <div id="display_file_write_cmdShell_data_form" align="central" style="display: block">
                    <label for="dFile">Chemin complet et nom de fichier à écrire sur la cible:</label>
                    <input type="text" class="form-control" id="dFile" name="dFile" placeholder="i.e. /var/www/writeable/customFile.fileType ">
                    <br />
                    <label for="cmdShellLang">Type de language shell à utiliser:</label>
                    <select class="form-control" id="cmdShellLang" name="cmdShellLang">
                      <option value="1">ASP</option>
                      <option value="2">ASPX</option>
                      <option value="3">JSP</option>
                      <option value="4" selected="selected">PHP</option>
                    </select>
                    <br />
                    <div id="display_file_write_revShell_data_form" align="central" style="display: none">
                      <label for="revShell_ip">Reverse Shell IP:</label>
                      <input type="text" class="form-control" id="revShell_ip" name="revShell_ip" placeholder="i.e. 10.10.10.10 ">
                      <br />
                      <label for="revShell_port">Reverse Shell Port:</label>
                      <input type="text" class="form-control" id="revShell_port" name="revShell_port" placeholder="i.e. 31337 ">
                    </div>
                  </div>
                </div><br />

                <label for="select_os_privs">Options du système d'exploitation:</label>
                <select class="form-control" id="os_privs" name="os_privs">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_os_cmd_data_form', 1); divHideAndSeek('display_osPwn_revShell_data_form', 1)">Aucun</option>
                  <option value="r" onClick="divHideAndSeek('display_os_cmd_data_form', 0); divHideAndSeek('display_osPwn_revShell_data_form', 1)">Exécuter la commande sur la cible</option>
                  <option value="p" onClick="divHideAndSeek('display_osPwn_revShell_data_form', 1); divHideAndSeek('display_osPwn_revShell_data_form', 0)" disabled>Meterpreter reverse shell</option>


                </select>
                <div id="display_os_cmd_data_form" align="central" style="display: none">
                  <br />
                  <label for="os_cmd">Commande à exécuter:</label>
                  <input type="text" class="form-control" id="os_cmd" name="osCmd" placeholder="i.e. whoami ">
                  <br />
                  <label for="cmdShellLang">(Optional) Type de langage shell à utiliser:</label>
                  <select class="form-control" id="cmdShellLang" name="cmdShellLang">
                    <option value="1">ASP</option>
                    <option value="2">ASPX</option>
                    <option value="3">JSP</option>
                    <option value="4" selected="selected">PHP</option>
                  </select>
                  <br />
                  <label for="os_cmd_dFile">(Optional) Chemin du fichier enregistrable à essayer:</label>
                  <input type="text" class="form-control" id="os_cmd_dFile" name="os_cmd_dFile" placeholder="i.e. /var/www/html/writeable/ ">
                  <br />
                </div><br />
                <div id="display_osPwn_revShell_data_form" align="central" style="display: none">
                  <label for="meterpreter_type">Type de payload à utiliser:</label>
                  <select class="form-control" id="meterpreter_type" name="meterpreter_type">
                    <option value="1" selected="selected">TCP - meterpreter/reverse_tcp</option>
             <!--   <option value="2">TCP Any Port</option> -->
                    <option value="3">HTTP - meterpreter/reverse_http</option>
                    <option value="4">HTTPS - meterpreter/reverse_https</option>
                  </select>
                  <br />
                  <label for="osPwn_tmpPath">(Optional) Chemin temporaire sur la cible</label>
                  <input type="text" class="form-control" id="osPwn_tmpPath" name="osPwn_tmpPath" placeholder="i.e. C:\\CUSTOM\\TEMP\\ ">
                  <br />
                  <label for="revShell_ip">Meterpreter Listener IP:</label>
                  <input type="text" class="form-control" id="osPwn_ip" name="osPwn_ip" placeholder="i.e. 10.10.10.10 ">
                  <br />
                  <label for="revShell_port">Meterpreter Listener Port:</label>
                  <input type="text" class="form-control" id="osPwn_port" name="osPwn_port" placeholder="i.e. 4444 ">
                  <br /><br />
                </div>
                <label for="select_win_reg">Windows Registry Options:</label>
                <select class="form-control" id="win_reg" name="win_reg">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_win_reg_data_form', 1)">Aucun</option>
                  <option value="r" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Lire la valeur de la clé de registre Windows</option>
                  <option value="a" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Ajouter des données de valeur de clé de registre Windows</option>
                  <option value="d" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Supprimer la valeur de la clé de registre Windows</option>
                </select><br />
                <br />
               </div>
              <div class="col-md-3"></div>
            </div>

            <div class="row">
              <div id="display_win_reg_data_form" align="central" style="display: none">
                <br />
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <label for="win_reg_key">Clé de registre Windows:</label>
                  <input type="text" class="form-control" id="win_reg_key" name="regKey" placeholder="i.e. HKEY_LOCAL_MACHINE\SOFTWARE\sqlmap ">
                  <br />
                  <label for="win_reg_value">Valeur du registre Windows:</label>
                  <input type="text" class="form-control" id="win_reg_value" name="regVal" placeholder="i.e. Test ">
                  <br />
                </div>
                <div class="col-md-4">
                  <label for="win_reg_type">Type de registre Windows:</label>
                  <input type="text" class="form-control" id="win_reg_type" name="regType" placeholder="i.e. REG_SZ ">
                  <br />
                  <label for="win_reg_data">Données du registre Windows:</label>
                  <input type="text" class="form-control" id="win_reg_data" name="regData" placeholder="i.e. 1 ">
                  <br />
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
