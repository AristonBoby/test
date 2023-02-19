<div wire:ignore.self class="modal fade" id="myModal" role="dialog" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit">Edit Data Pasien</h5>
            <div wire:loading>
              <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body" wire:loading.remove>
            <h4 class="text-center"><u>SKRINING RIWAYAT PENYAKIT</u></h4>
            <form wire:submit.prevent='riwayatPenyakit' class="form-horizontal">
              <div class="callout callout-danger" style="margin-top:15px;">
                  <h4 class="control-label mb-4"><u>Riwayat Penyakit Tidak Menular Pada Keluarga</u></h4>
                  <div class="form-group text-xs row">
                      <label class="control-label col-md-3 col-lg-2 col-sm-12 text-md">Riwayat 1</label>
                      <div class="col-md-9 col-lg-9 col-sm-9">
                          <select class="form-control form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                              <option>Benjolan Abnormal Pada Payudara</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row" style="margin-top:-9px;">
                      <label class="control-label col-md-3 col-lg-2 col-sm-12 text-md">Riwayat 2</label>
                      <div class="col-md-9 col-lg-9 col-sm-9" >
                          <select class="form-control text-md form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                              <option>Benjolan Abnormal Pada Payudara</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row" style="margin-top:-9px;">
                      <label class="control-label col-md-3 col-lg-2 col-sm-12 text-md">Riwayat 3</label>
                      <div class="col-md-9 col-lg-9 col-sm-12">
                          <select class="form-control text-md form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                              <option>Benjolan Abnormal Pada Payudara</option>
                          </select>
                      </div>
                  </div>
              </div>
                <div class="callout callout-danger" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px;">Riwayat Penyakit Tidak Menular Pada Diri Sendiri</label>
                  <div class="form-group row">
                      <label class="control-label text-md col-md-3 col-lg-2 col-sm-2">Riwayat 1</label>
                      <div class="col-md-9 col-lg-9 col-sm-9">
                          <select class="form-control text-md form-control-sm rounded-0">
                              <option selected>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="control-label text-md col-md-3 col-lg-2 col-sm-2">Riwayat 2</label>
                      <div class="col-md-9 col-lg-9 col-sm-9" style="margin-top:-9px;">
                          <select class="form-control text-md form-control-sm rounded-0">
                              <option selected>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="control-label text-md col-md-3 col-lg-2 col-sm-2">Riwayat 3</label>
                      <div class="col-md-9 col-lg-9 col-sm-9" style="margin-top:-12px;">
                          <select class="form-control text-md form-control-sm rounded-0">
                              <option selected>--- Pilih Salah Satu ---</option>
                              <option>Penyakit Diabetes</option>
                              <option>Penyakit Hypertensi</option>
                              <option>Penyakit Jantung</option>
                              <option>Penyakit Stroke</option>
                              <option>Penyakit Asma</option>
                              <option>Penyakit Kanker</option>
                              <option>Kolesterol Tinggi</option>
                          </select>
                      </div>
                  </div>
                </div>
              <div class="callout callout-warning text-sm">
                  <label class="control-label ">Faktor Risiko</label>
                    <div class="col-lg-12 col-sm-12 col-md-12 form-horizontal row">
                        <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Merokok</label>
                        <div class="col-md-12 col-sm-12 col-lg-2">
                            <select class="form-control form-control-sm rounded-0 text-xs">
                                <option>--- Pilih Salah Satu ---</option>
                                <option>YA</option>
                                <option>TIDAK</option>
                            </select>
                        </div>
                        <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Kurang Aktifitas Fisik</label>
                        <div class="col-md-12 col-sm-12 col-lg-2">
                            <select class="form-control text-xs form-control-sm rounded-0">
                                <option>--- Pilih Salah Satu ---</option>
                                <option>YA</option>
                                <option>TIDAK</option>
                            </select>
                        </div>
                        <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Gula Berlebihan</label>
                        <div class="col-md-12 col-sm-12 col-lg-2">
                            <select class="form-control text-xs form-control-sm rounded-0">
                                <option>--- Pilih Salah Satu ---</option>
                                <option>YA</option>
                                <option>TIDAK</option>
                            </select>
                        </div>
                      <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Garam Berlebihan</label>
                      <div class="col-md-12 col-sm-12 col-lg-2">
                          <select class="form-control text-xs form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>YA</option>
                              <option>TIDAK</option>
                          </select>
                      </div>
                      <label class="ccontrol-label col-md-12 col-lg-2 col-sm-12 text-sm">Lemak Berlebihan</label>
                      <div class="col-md-12 col-sm-12 col-lg-2">
                          <select class="form-control text-xs form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>YA</option>
                              <option>TIDAK</option>
                          </select>
                      </div>
                      <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Kurang Makan Buah dan Sayur</label>
                      <div class="col-md-12 col-sm-12 col-lg-2">
                          <select class="form-control text-sm form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>YA</option>
                              <option>TIDAK</option>
                          </select>
                      </div>
                      <label class="control-label col-md-12 col-lg-2 col-sm-12 text-sm">Konsumsi Alkohol</label>
                      <div class="col-md-12 col-sm-12 col-lg-2">
                          <select class="form-control text-xs form-control-sm rounded-0">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>YA</option>
                              <option>TIDAK</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="callout callout-info" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px;">Tekanan Darah</label>
                      <div class="form-group row">
                          <label class="control-label col-md-1 text-md">Sistol</label>
                          <div class="col-md-1">
                              <input type="text" class="form-control form-control-md">
                          </div>
                          <label class="control-label col-md-1 text-md form-control-md">Diastol</label>
                          <div class="col-md-1">
                              <input type="text" class="form-control">
                          </div>
                      </div>
              </div>
              <div class="callout callout-info" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px; ">IMT</label>
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-md">Tinggi Badan</label>
                          <div class="col-md-1">
                              <input type="text" class="form-control form-control-md">
                          </div>
                          <label class="control-label col-md-2 text-md form-control-md">Berat Badan</label>
                          <div class="col-md-1">
                              <input type="text" class="form-control">
                          </div>
                      </div>
              </div>
              <div class="callout callout-success" style="margin-top:15px;">

                          <div class="col-md-3 col-sm-3 col-lg-3 row">
                              <label class="control-label col-md-8 text-md">Lingkar Perut</label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control form-control-md">
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-lg-3 row">
                              <label class="control-label col-md-8 text-md form-control-md">Pemeriksaan Gula</label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-lg-3 row">
                              <label class="control-label col-md-8 text-md form-control-md">HBA1C</label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-lg-3 row">
                              <label class="control-label col-md-8 text-md form-control-md">Rujuk RS</label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control">
                              </div>
                          </div>

              </div>
              <div class="callout callout-success" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px;">Diagnosis</label>
                  <div class="form-group row">
                      <label class="control-label col-md-3 text-md form-control-md">Diagnosis 1</label>
                      <div class="col-md-9">
                          <select class=" form-control">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>ASMA BRONCHIALE</option>
                              <option>HIPER KOLESTEROL</option>
                              <option>DIABETES MILITUS GESTASIONAL</option>
                              <option>DIABETES MILITUS TIPE 1</option>
                              <option>DIABETES MILITUS TIPE 2</option>
                              <option>DM-TB</option>
                              <option>GAGAL JANTUNG</option>
                              <option>GANGUAN REFRAKSI</option>
                              <option>GINJAL KRONIK</option>
                              <option>GLAUKOMA</option>
                              <option>HIPERTENSI</option>
                              <option>HIPERTIROID</option>
                              <option>HIPERTROPI PROSTAT</option>
                              <option>HIPOTIROID</option>
                              <option>JANTUNG KORONER</option>
                              <option>KANKER KOLOREKTAL</option>
                              <option>KANKER PAYUDARA</option>
                              <option>KANKER LEHER RAHIM</option>
                              <option>KATARAK</option>
                              <option>LEUKIMIA</option>
                              <option>LUPUS/SLE</option>
                              <option>GPAB</option>
                              <option>OBESITAS</option>
                              <option>OMSK</option>
                              <option>OSTEOPORISIS</option>
                              <option>PPOK</option>
                              <option>PRESBICUSIS</option>
                              <option>PSORIASIS FULGARIS</option>
                              <option>REMATOID ARTRITIS</option>
                              <option>RETINOBLASTOMA</option>
                              <option>SERUMEN PROP</option>
                              <option>STROKE</option>
                              <option>THALASEMIA</option>
                              <option>TIROID</option>
                              <option>TULI KONGENITAL</option>
                              <option>LESI PRAKANKER SERVIKS</option>
                              <option>RETINOPATI DIABETIK</option>
                              <option>KEBUTAAN PADA ANAK</option>
                              <option>LOW VISION</option>
                              <option>GANGGUAN PENDEGARAN AKIBAT BISING</option>
                              <option>TULI AKIBAT OBAT OTOTOKSIKg</option>
                          </select>
                      </div>
                      <label class="control-label col-md-3 text-md form-control-md">Diagnosis 2</label>
                      <div class="col-md-9">
                          <select class=" form-control">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>ASMA BRONCHIALE</option>
                              <option>HIPER KOLESTEROL</option>
                              <option>DIABETES MILITUS GESTASIONAL</option>
                              <option>DIABETES MILITUS TIPE 1</option>
                              <option>DIABETES MILITUS TIPE 2</option>
                              <option>DM-TB</option>
                              <option>GAGAL JANTUNG</option>
                              <option>GANGUAN REFRAKSI</option>
                              <option>GINJAL KRONIK</option>
                              <option>GLAUKOMA</option>
                              <option>HIPERTENSI</option>
                              <option>HIPERTIROID</option>
                              <option>HIPERTROPI PROSTAT</option>
                              <option>HIPOTIROID</option>
                              <option>JANTUNG KORONER</option>
                              <option>KANKER KOLOREKTAL</option>
                              <option>KANKER PAYUDARA</option>
                              <option>KANKER LEHER RAHIM</option>
                              <option>KATARAK</option>
                              <option>LEUKIMIA</option>
                              <option>LUPUS/SLE</option>
                              <option>GPAB</option>
                              <option>OBESITAS</option>
                              <option>OMSK</option>
                              <option>OSTEOPORISIS</option>
                              <option>PPOK</option>
                              <option>PRESBICUSIS</option>
                              <option>PSORIASIS FULGARIS</option>
                              <option>REMATOID ARTRITIS</option>
                              <option>RETINOBLASTOMA</option>
                              <option>SERUMEN PROP</option>
                              <option>STROKE</option>
                              <option>THALASEMIA</option>
                              <option>TIROID</option>
                              <option>TULI KONGENITAL</option>
                              <option>LESI PRAKANKER SERVIKS</option>
                              <option>RETINOPATI DIABETIK</option>
                              <option>KEBUTAAN PADA ANAK</option>
                              <option>LOW VISION</option>
                              <option>GANGGUAN PENDEGARAN AKIBAT BISING</option>
                              <option>TULI AKIBAT OBAT OTOTOKSIKg</option>
                          </select>
                      </div>
                      <label class="control-label col-md-3 text-md form-control-md ">Diagnosis 3</label>
                      <div class="col-md-9">
                          <select class=" form-control">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>ASMA BRONCHIALE</option>
                              <option>HIPER KOLESTEROL</option>
                              <option>DIABETES MILITUS GESTASIONAL</option>
                              <option>DIABETES MILITUS TIPE 1</option>
                              <option>DIABETES MILITUS TIPE 2</option>
                              <option>DM-TB</option>
                              <option>GAGAL JANTUNG</option>
                              <option>GANGUAN REFRAKSI</option>
                              <option>GINJAL KRONIK</option>
                              <option>GLAUKOMA</option>
                              <option>HIPERTENSI</option>
                              <option>HIPERTIROID</option>
                              <option>HIPERTROPI PROSTAT</option>
                              <option>HIPOTIROID</option>
                              <option>JANTUNG KORONER</option>
                              <option>KANKER KOLOREKTAL</option>
                              <option>KANKER PAYUDARA</option>
                              <option>KANKER LEHER RAHIM</option>
                              <option>KATARAK</option>
                              <option>LEUKIMIA</option>
                              <option>LUPUS/SLE</option>
                              <option>GPAB</option>
                              <option>OBESITAS</option>
                              <option>OMSK</option>
                              <option>OSTEOPORISIS</option>
                              <option>PPOK</option>
                              <option>PRESBICUSIS</option>
                              <option>PSORIASIS FULGARIS</option>
                              <option>REMATOID ARTRITIS</option>
                              <option>RETINOBLASTOMA</option>
                              <option>SERUMEN PROP</option>
                              <option>STROKE</option>
                              <option>THALASEMIA</option>
                              <option>TIROID</option>
                              <option>TULI KONGENITAL</option>
                              <option>LESI PRAKANKER SERVIKS</option>
                              <option>RETINOPATI DIABETIK</option>
                              <option>KEBUTAAN PADA ANAK</option>
                              <option>LOW VISION</option>
                              <option>GANGGUAN PENDEGARAN AKIBAT BISING</option>
                              <option>TULI AKIBAT OBAT OTOTOKSIKg</option>
                          </select>
                      </div>
                      <label class="control-label col-md-3 text-md form-control-md ">Terapi Farmakologi</label>
                      <div class="col-md-9">
                          <select class="form-control">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>Diberikan Obat<option>
                              <option>Tidak Diberikan Obat</option>
                          </select>
                      </div>
                      <label class="control-label col-md-3 text-md form-control-md">Konseling, Informasi dan Edukasi Kesehatan</label>
                      <div class="col-md-9">
                          <select class="form-control">
                              <option>--- Pilih Salah Satu ---</option>
                              <option>Gizi<option>
                              <option>Aktifitas Fisik</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="callout callout-success" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px;">PEMERIKSAAN IVA</label>
                  <div class="row">
                      <div class="form-group row col-md-6">
                          <label class="control-label col-md-6 text-md form-control-md">Hasil IVA</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>POSITIF</option>
                                  <option>NEGATIF</option>
                                  <option>CURIGA KANKER</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row col-md-6">
                          <label class="control-label col-md-6 text-md form-control-md">Tindak Lanjut IVA Positif</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>KRIOTERAPI<option>
                                  <option>RUJUK</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <label class="control-label " style="margin-top:-17px;">PEMERIKSAAN SADANIS</label>
                      </div>
                      <div class="form-group row col-md-6">
                          <label class="control-label col-md-6 text-md form-control-md">Hasil SADANIS</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>BENJOLAN</option>
                                  <option>TIDAK ADA BENJOLAN</option>
                                  <option>CURIGA KANKER</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row col-md-6">
                          <label class="control-label col-md-6 text-md form-control-md">Tindak Lanjut SADANIS</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>RUJUK</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="callout callout-success" style="margin-top:15px;">
                  <label class="control-label " style="margin-top:-17px;">FORM UBM</label>
                  <div class="row col-md-12">
                      <div class="form-group row col-md-4">
                          <label class="control-label col-md-4 text-md form-control-md" >Konseling</label>
                          <div class="col-lg-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>KONSELING 1</option>
                                  <option>KONSELING 2</option>
                                  <option>KONSELING 3</option>
                                  <option>KONSELING 4</option>
                                  <option>KONSELING 5</option>
                                  <option>KONSELING 6</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row col-md-4">
                          <label class="control-label col-md-4 text-md form-control-md" >CAR</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>CAR 3</option>
                                  <option>CAR 6</option>
                                  <option>CAR 9</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row col-md-4">
                          <label class="control-label col-md-4 text-md form-control-md" >Rujuk UBM</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>YA</option>
                                  <option>TIDAK</option>
                              </select>
                          </div>
                      </div>
                      <div class=" form-group row col-md-4">
                          <label class="control-label col-md-4 text-md form-control-md">Kondisi</label>
                          <div class="col-md-6">
                              <select class="form-control">
                                  <option>--- Pilih Salah Satu ---</option>
                                  <option>SUKSES</option>
                                  <option>KAMBUH</option>
                                  <option>DO</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
                  <div class="col-md-12">
                      <button class="btn btn-success btn-md mt-2 float-right mt-50 btn-flat" type="submit"><i class="fas fa-save "></i> Simpan Skrining</button>
                      <input type="text" wire:model="id_kunjungan" hidden>
                      <input type="text" wire:model="id_pasien" hidden>
                  </div>
          </form>
        </div>
      </div>
    </div>
</div>
