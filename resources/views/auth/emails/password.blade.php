<p>
  <strong>MejoresVendedores</strong><br />
  <em>Recuperación de constraseña</em>
<p>
<p>
  Se ha solicitado la recuperación de contraseña para el usuario:<br />
  Email: <?php echo $user->getEmailForPasswordReset(); ?>
</p>
<p>Si usted no solicitó la recuperación, sólo ignore este correo.</p>
<p>
  Para resetear su contraseña, visite el siguiente enlace: <br />
  <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>
</p>
<p>
  Este link caducará en los próximos 60 minutos. En ese caso deberás solicitarlo nuevamente.
</p>
