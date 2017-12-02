{$subject="Запрос от `$mquery->name|escape`" scope=parent}
<h1 style='font-weight:normal;font-family:arial;'>Запрос от {$mquery->name|escape}</h1>
<table cellpadding=6 cellspacing=0 style='border-collapse: collapse;'>
  <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Имя
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
      {$mquery->name|escape}
    </td>
  </tr>
  <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Телефон
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
      {$mquery->tel|escape}
    </td>
  </tr>
  {if $mquery->info}
   <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Интересует:
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
      {$mquery->info|escape}
    </td>
  </tr>
  {/if}
</table>