<?php namespace Xtwoend\News\Posts;
    	
/**
 * Part of the package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause)
 * @copyright  (c) 2014 
 */

use Illuminate\Database\Eloquent\Model;
use Xtwoend\News\Relations\PostRelations;
use Xtwoend\News\Observers\SlugObserver;

class Post extends Model {	
	
	use PostRelations;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'post_id';

	protected $fillable = [	
							'post_title',
							'post_slug', 
							'post_content',
							'post_upperdeck',
							'post_category',
							'post_desc',
							'post_author',
							'post_jurnalis',
							'post_publish_date',
							'post_status',
							'post_future_image',
							'post_lang',
							'mikrosite',
							'post_type'
						];

	/**
	 * Observe slug
	 * @return void
	 */
	public static function boot()
    {
        parent::boot();
        static::observe(new SlugObserver);
    }
}