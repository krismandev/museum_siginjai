<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksi';
    protected $fillable = ['no_jenis','no_koleksi','nama_koleksi','no_registrasi','gambar','asal_perolehan','tanggal_perolehan','tanggal_pembuatan','tempat_pembuatan','tempat_penyimpanan','ukuran','deskripsi','kurator','tanggal','user_id'];

    protected $primaryKey = ['no_jenis', 'no_koleksi'];

    public $incrementing = false;

    public function getImage()
    {
        if ($this->gambar != null) {
            return asset("storage/koleksi/".$this->gambar);
        }else{
            return asset("asset_dashboard/images/default_museum_item.jpg");
        }
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class,'no_jenis','no_jenis');
    }

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $query
    //         ->where('no_jenis', '=', $this->getAttribute('no_jenis'))
    //         ->where('no_koleksi', '=', $this->getAttribute('no_koleksi'));

    //     return $query;
    // }
}
