<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class TemplateBlock extends Model
{
    protected $table = 'template_blocks';
    public $timestamps = false;
    protected $fillable = [
                            'parent_id',
                            'name',
                            ];

    public function selectBoxBlock($select_id = '', $str_split = '', $parent_id = '0')
    {
        $list_block = self::where('parent_id', '=', $parent_id)->get();
        $str_return = '';
        if ($list_block) {
            foreach ($list_block as $block) {
                $block_id = $block->id;
                if ($block_id == $select_id) {
                    $attributeOption = ' selected';
                } else {
                    $attributeOption = '';
                }
                if ($parent_id == 0 && $block_id != 1) {
                    $disable = ' disabled';
                } else {
                    $disable = '';
                }
                $str_return .= "<option value='".$block_id."'".$attributeOption.''.$disable.'>'.$str_split.$block->name.'</option>';
                $str_return .= self::selectBoxBlock($select_id, '|---', $block_id);
            }
        }

        return $str_return;
    }
}
