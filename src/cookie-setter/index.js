import { registerBlockType } from "@wordpress/blocks";
import Edit from "./edit";
import "./editor.scss";

registerBlockType("utk/cookie-setter", {
  edit: Edit,
});
