<p>Dear {{ $user }}</p>
<p>Pengajuan Review Dokumen Check Sheet sudah diapprove & filing oleh <strong>{{ $user_legal }} - {{ $jabatan_legal }}</strong></p>
<p>Tanggal PKS : <strong>{{ $tanggal }} pukul {{ $jam }}</strong></p>
<p>Silahkan diperiksa di web <a href="{{ env("APP_URL") }}">{{ env("APP_URL") }}</a> untuk melihat detailnya.</p>
<p>Mohon untuk tidak membalas email ini.</p>
<p>Thank You</p>