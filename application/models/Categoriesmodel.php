<?php

class Categoriesmodel extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param int $parentId
	 * @return mixed
	 */
	public function getCategory($parentId = 0)
	{
		return $this->db->get_where($this->categoryTable, ["status" => 1, "parent_id" => $parentId])->result();
	}

	/**
	 * @param string $slug
	 * @return mixed
	 */
	public function getCategoryBySlug($slug = "")
	{
		return $this->db->get_where($this->categoryTable, ["status" => 1, "slug" => $slug])->row();
	}

	/**
	 * @param array $columns
	 * @return mixed
	 */
	public function categoryTreeByColumn($columns = [])
	{
		$columns = array_merge($columns, ["status" => 1]);
		return $this->db->get_where($this->categoryTable, $columns)->result();
	}

	/**
	 * @param int $parentId
	 * @param string $subMark
	 * @param array $ids
	 * @return mixed|string
	 */
	function categoryTree($parentId = 0, &$subMark = '', $ids = [])
	{
		$query = $this->db->query("SELECT * FROM " . $this->categoryTable . " WHERE parent_id = $parentId ORDER BY title ASC");
		if ($query->num_rows() > 0) {
			$rows = $query->result();
			foreach ($rows as $row) {
				$isChecked = $this->md_in_array($ids, "category_id", $row->id) ? 'checked="checked"' : "";
				$subMark .= '<input '.$isChecked.' title="' . $row->title . '" parent_id="' . $parentId . '" type="checkbox" name="category[]" value="' . $row->id . '"> ' . $row->title . '<br>';
				$this->categoryTree($row->id, $subMark, $ids);
			}
		}

		return $subMark;
	}
}
