<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model {

    /**
     * @primaryKey string - primry key column.
     * @dateFormat string - date storage format
     * @guarded string - allow mass assignment except specified
     * @CREATED_AT string - creation date column
     * @UPDATED_AT string - updated date column
     */

    //protected $table = 'foobar';
    protected $primaryKey = 'formfield_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['formfield_id'];
    const CREATED_AT = 'formfield_created';
    const UPDATED_AT = 'formfield_updated';

}
